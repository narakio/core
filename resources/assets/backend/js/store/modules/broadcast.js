import * as types from '../mutation-types'
import store from 'back_path/store'
import Echo from 'laravel-echo'
import io from 'socket.io-client'

const listeners = e => {
  store.dispatch('session/notify',
    {data: {received: e.title}})
}

export const state = {
  broadcaster: null,
  joinedNotificationChannels: [],
  isBroadcasting: false
}

export const getters = {
  broadcaster: state => state.broadcaster,
  isBroadcasting: state => state.broadcaster != null
}

export const mutations = {
  [types.BROADCAST_INIT] (state, data) {
    if (data.user.hasOwnProperty('system_events_subscribed') &&
      data.user.system_events_subscribed && !state.isBroadcasting) {
      state.broadcaster = new Echo({
        broadcaster: 'socket.io',
        client: io,
        transports: ['websocket'],
        host: `${process.env.MIX_ECHO_SERVER_HOST}:${process.env.MIX_ECHO_SERVER_PORT}`,
        auth: {
          headers: {
            'Authorization': `Bearer ${data.token}`
          }
        }
      })
      state.isBroadcasting = true
      let subs = data.user.system_events_subscribed.split(',')
      subs.forEach((id) => {
        state.joinedNotificationChannels.push(parseInt(id))
        state.broadcaster.private(`notifications.${id}`)
          .listen('.default', listeners)
      })
    }
  },
  [types.BROADCAST_KILL] (state) {
    if (state.broadcaster != null) {
      state.broadcaster.disconnect()
      state.broadcaster = null
      state.isBroadcasting = false
    }
  },
  [types.UPDATE_NOTIFICATIONS] (state, data) {
    let joined = []
    state.joinedNotificationChannels.forEach(channel => {
      if (!data.events.includes(parseInt(channel))) {
        state.broadcaster.leave(`notifications.${channel}`)
      }
    })
    data.events.forEach(channel => {
      let ch = parseInt(channel)
      joined.push(ch)
      if (!state.joinedNotificationChannels.includes(ch)) {
        state.broadcaster.private(`notifications.${channel}`)
          .listen('.default', listeners)
      }
    })
    state.joinedNotificationChannels = joined
  }
}

export const actions = {
  init ({commit}, {data}) {
    commit(types.BROADCAST_INIT, data)
  },
  kill ({commit}) {
    commit(types.BROADCAST_KILL)
  },
  updateNotifications ({commit, state}, {data}) {
    if (!state.isBroadcasting) {
      commit(types.BROADCAST_INIT, data)
    } else {
      commit(types.UPDATE_NOTIFICATIONS, data)

    }
  }
}
