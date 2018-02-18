<?php
return [
    'route' => [
        'admin-dashboard' => 'Home',
        'admin-user-index'=>'User',
        'admin-user-edit'=>'Edit'
    ],
    'general' => [
        'ok' => 'Ok',
        'cancel' => 'Cancel',
        'name' => 'Name',
        'home' => 'Home',
        'settings' => 'Settings',
        'profile' => 'Profile',
        'save'=>'Save',
        'update' => 'Update',
        'logout' => 'Logout',
        'login' => 'Log In',
        'register' => 'Register',
        'success' => 'Success!',
        'password' => 'Password',
        'actions'=>'actions',
        'email' => 'E-mail',
    ],
    'db'=>[
        'username'=>'User name',
        'first_name'=>'First name',
        'last_name'=>'Last name',
        'new_email'=>'New e-mail',
        'new_username'=>'New username'
    ],
    'form'=>[
      'description'=>[
          'username'=>'The user\'s shorthand name.',
          'first_name'=>'The user\'s first (given) name.',
          'last_name'=>'The user\'s last (family) name.',
          'new_email'=>'"{0}" is the current e-mail address.',
          'new_username'=>'"{0}" is the current username.'
      ]
    ],
    'modal' => [
        'error' => ['h' => 'Oops...', 't' => 'Something went wrong! Please try again.'],
        'token_expired' => [
            'h' => 'Session Expired!',
            't' => 'Please log in again to continue.',
        ]
    ],
    'error' => [
        'page_not_found' => 'Page Not Found',
        'passwords_dont_match' => 'The passwords must be identical.',
        'form'=>'Errors were found on this form.'

    ],
    'message' => [
        'info_updated' => 'Your info has been updated!',
        'password_updated' => 'Your password has been updated!',

    ],
    'pages' => [
        'auth' => [
            'remember_me' => 'Remember Me',
            'forgot_password' => 'Forgot Your Password?',
            'send_password_reset_link' => 'Send Password Reset Link',
            'confirm_password' => 'Confirm Password',
            'reset_password' => 'Reset Password',
            'your_password' => 'Your Password',
            'new_password' => 'New Password',
        ]
    ],
    'tables' => [
        'empty' => 'There is currently no data available.'
    ],
    'go_home' => 'Go Home',
    'toggle_navigation' => 'Toggle navigation',
    'your_info' => 'Your Info',
];
