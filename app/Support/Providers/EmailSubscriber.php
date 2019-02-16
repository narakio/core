<?php namespace App\Support\Providers;

use App\Contracts\Models\EmailSubscriber as SubscriberInterface;
use App\Models\Email\EmailSubscriber as SubscriberModel;
use App\Models\Email\EmailList;
use App\Models\Entity;
use App\Models\EntityType;
use App\Models\Person;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;

/**
 * @method \App\Models\Email\EmailSubscriber createModel(array $attributes = [])
 */
class EmailSubscriber extends Model implements SubscriberInterface
{
    protected $model = \App\Models\Email\EmailSubscriber::class;

    /**
     * @param int $personID
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function buildAllUser($personID, $columns = ['*']): Builder
    {
        return $this->createModel()->newQuery()
            ->recipientEntityType()
            ->emailList()
            ->person()
            ->user($personID)
            ->select($columns);
    }

    /**
     * @param int $personID
     * @param array $savedList
     */
    public function addUserToLists($personID, $savedList)
    {
        $currentUserLists = $this->buildAllUser(
            $personID,
            ['email_lists.email_list_id'])
            ->pluck('email_list_id')->toArray();

        $listsToRemove = array_diff($currentUserLists, $savedList);
        $listsToAdd = array_diff($savedList, $currentUserLists);
        if (empty($listsToAdd) && empty($listsToRemove)) {
            return;
        }
        $targetID = EntityType::getEntityTypeID(Entity::PEOPLE, intval($personID));

        if (!is_null($targetID)) {
            if (!empty($listsToRemove)) {
                SubscriberModel::query()
                    ->where('email_subscriber_target_id', '=', $targetID)
                    ->whereIn('email_list_id', $listsToRemove)->delete();
            }

            if (!empty($listsToAdd)) {
                $subscriberDb = [];
                foreach ($listsToAdd as $listId) {
                    $subscriberDb[] = [
                        'email_subscriber_target_id' => $targetID,
                        'email_list_id' => $listId
                    ];
                }
                try {
                    SubscriberModel::insert($subscriberDb);
                } catch (QueryException $e) {
                    //Probably a unique index being triggered in case we subscribe the user
                    //to lists he's already in.
                    return;
                }
            }
        }
    }

    /**
     * @param array $input
     * @param array $lists
     * @return void
     */
    public function addPersonToLists($input, $lists = [])
    {
        if (empty($lists)) {
            $lists = EmailList::getDefaults();
        }

        if (!isset($input['email']) || empty($input['email'])) {
            return;
        }

        try {
            $person = new Person([
                'full_name' => $input['full_name'],
                'email' => $input['email']
            ]);
            $person->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $person = Person::buildByEmail($input['email'], ['person_id'])->first();
            if (is_null($person)) {
                return;
            }
        }

        $this->addUserToLists($person->getKey(), $lists);
    }

}