<?php
return [
    'title' => [
        'login' => 'Log In',
    ],
    'breadcrumb' => [
        'admin-dashboard' => 'Home',
        'admin-users-index' => 'Users',
        'admin-groups-index' => 'Groups',
        'admin-users-edit' => 'Edit',
        'admin-groups-edit' => 'Edit',
        'admin-groups-add' => 'New Group',
        'admin-groups-members' => 'Edit Members',
        'admin-blog-index' => 'Blog Posts',
        'admin-blog-add' => 'Create',
        'admin-blog-edit' => 'Edit',
        'admin-blog-category' => 'Categories',
        'admin-settings-password' => 'Your password',
        'admin-settings-profile' => 'Your profile',
        'admin-settings-general' => 'Your general settings',
    ],
    'sidebar' => [
        'main_nav' => 'MAIN NAVIGATION',
        'dashboard' => 'Dashboard',
        'users' => 'Users',
        'groups' => 'Groups',
        'blog' => 'Blog',
        'list' => 'List',
        'add' => 'Add',
        'category' => 'Categories'
    ],
    'general' => [
        'ok' => 'Ok',
        'cancel' => 'Cancel',
        'name' => 'Name',
        'home' => 'Home',
        'settings' => 'Settings',
        'profile' => 'Profile',
        'general' => 'General',
        'save' => 'Save',
        'save_changes' => 'Save Changes',
        'update' => 'Update',
        'create' => 'Create',
        'logout' => 'Logout',
        'login' => 'Log In',
        'register' => 'Register',
        'success' => 'Success!',
        'password' => 'Password',
        'actions' => 'Actions',
        'email' => 'E-mail',
        'back' => 'Back',
        'next' => 'Next',
        'permission' => 'Permission|Permissions',
        'toggle' => 'Toggle On/Off',
        'select_all' => 'Select all',
        'apply' => 'Apply',
        'search' => 'Search',
        'reset_filters' => 'Reset Filters',
        'delete' => 'Delete',
        'reload' => 'Reload',
        'status' => 'Status',
        'expand_all' => 'Expand all',
        'collapse all' => 'Collapse all',
    ],
    'db' => [
        'user' => 'User|Users',
        'group' => 'Group|Groups',
        'blog_post' => 'Blog Post|Blog Posts',
        'username' => 'User name',
        'first_name' => 'First name',
        'last_name' => 'Last name',
        'full_name' => 'Full name',
        'new_email' => 'New e-mail',
        'new_username' => 'New username',
        'user_created_at' => 'Registration date',
        'group_name' => 'Group name',
        'new_group_name' => 'New group name',
        'group_mask' => 'Group mask',
        'member_count' => 'Number of members',
        'blog_post_title' => 'Post title'
    ],
    'db_raw' => [
        'full_name' => 'full_name',
        'username' => 'username',
        'email' => 'email',
        'group_name' => 'group_name',
        'created_at' => 'created_at',
        'blog_post_title' => 'blog_post_title'
    ],
    'db_raw_inv' => [
        'full_name' => 'full_name',
        'username' => 'username',
        'email' => 'email',
        'group_name' => 'group_name',
        'created_at' => 'created_at',
        'blog_post_title' => 'blog_post_title'
    ],
    'filters' => [
        'sortBy' => 'sortBy',
        'order' => 'order',
        'users_name' => 'name',
        'users_group' => 'group',
        'users_created' => 'created',
        'blog_title' => 'title',
        'asc' => 'asc',
        'desc' => 'desc',
        'day' => 'day',
        'week' => 'week',
        'month' => 'month',
        'year' => 'year'
    ],
    'filter_labels' => [
        'users_group' => 'Group:',
        'users_name' => 'Full name:',
        'blog_title' => 'Post title:',
        'users_created' => 'Registration period:',
        'created_today' => 'Registered today',
        'created_week' => 'Less than a week ago',
        'created_month' => 'Less than a month ago',
        'created_year' => 'Less than a year ago',
    ],
    'filters_inv' => [
        'registration' => 'createdAt',
        'blog_post_title' => 'title',
        'group' => 'group',
        'name' => 'fullName',
        'sortBy' => 'sortBy',
        'title' => 'title',
        'order' => 'order',
        'fullName' => 'name',
        'createdAt' => 'created',
    ],
    'constants' => [
        'BLOG_POST_STATUS_DRAFT' => 'Draft',
        'BLOG_POST_STATUS_REVIEW' => 'Under review',
        'BLOG_POST_STATUS_PUBLISHED' => 'Published'
    ],
    'form' => [
        'description' => [
            'username' => 'The user\'s shorthand name.',
            'first_name' => 'The user\'s first (given) name.',
            'last_name' => 'The user\'s last (family) name.',
            'new_email' => '"{0}" is the current e-mail address.',
            'new_username' => '"{0}" is the current username.',
            'group_name' => 'The group name can only contain alphanumeric characters and underscores.',
            'new_group_name' => '"{0}" is the current group name. The group name can only contain alphanumeric characters and underscores.',
            'group_mask' => 'Determines the group\'s position in its hierarchy. The lower the mask, the higher the group status.'
        ],
    ],
    'modal' => [
        'error' => [
            'h' => 'Oops...',
            't' => 'Something went wrong! Please try again.'
        ],
        'token_expired' => [
            'h' => 'Session Expired!',
            't' => 'Please log in again to continue.',
        ],
        'unauthorized' => [
            'h' => 'Access Denied',
            't' => 'You are not authorized to view this page.',
        ],
        'user_delete' => [
            'h' => 'Confirm user deletion',
            't' => 'Do you really want to delete user {name}?'
        ]
    ],
    'error' => [
        'page_not_found' => 'Page Not Found',
        'passwords_dont_match' => 'The passwords must be identical.',
        'form' => 'Errors were found on this form.'

    ],
    'message' => [
        'profile_updated' => 'Your profile has been updated!',
        'password_updated' => 'Your password has been updated!',
        'user_update_ok' => 'The user was updated. It may take a few seconds for permissions to update.',
        'user_delete_ok' => 'User {name} was deleted.|The users were deleted.',
        'group_update_ok' => 'The group was updated. It may take a few seconds for permissions to update.',
        'group_delete_ok' => 'Group {group} was deleted.',
        'group_create_ok' => 'The group was created.'
    ],
    'pages' => [
        'auth' => [
            'remember_me' => 'Remember Me',
            'forgot_password' => 'Forgot Your Password?',
            'send_password_reset_link' => 'Send Password Reset Link',
            'confirm_password' => 'Confirm Password',
            'reset_password' => 'Reset Password',
            'new_password' => 'New Password',
        ],
        'members' => [
            'member_search' => 'Type user full name here, i.e \'Jane Doe\'',
            'group_name' => 'Group:',
            'edit_preview' => 'Preview',
            'no_changes' => 'No changes so far.',
            'add_members' => 'Add members',
            'remove_members' => 'Remove members',
            'user_add_tag' => 'The following users will be added:',
            'user_no_add' => 'No added members.',
            'user_remove_tag' => 'The following users will be removed:',
            'user_no_remove' => 'No removed members.',
            'user_none' => 'There are no members in this group.',
            'current_members' => 'The following users are members of this group:',
        ],
        'users' => [
            'warning1' => 'Setting individual permissions for this user 
            will override permissions set on groups of which the user is a member.',
            'warning2' => 'We recommend setting permissions on groups instead, 
            and use individual user permissions to handle exceptions.',
            'filter_full_name' => 'Filter by full name',
            'filter_group' => 'Filter by group',
            'filter_created_at' => 'Filter by registration date',
        ],
        'groups' => [
            'info1' => 'Permissions for all members of the group are defined here.',
            'info2' => 'Individual permissions can also be set at the user level,
            in which case user permissions will override permissions set here.'
        ],
        'settings' => [
            'language' => 'Language',
            'avatar-tab' => 'Avatar',
            'avatar-ul-tab' => 'Upload avatar',
            'delete_avatar' => 'Delete avatar',
            'click_default' => 'Click on an avatar to make it the default.',
            'image_uploading' => 'Processing in progress...',
            'image_proceed' => 'Proceed to cropping',
            'image_uploaded' => 'The avatar has been processed, you can return to the avatar tab.'
        ],
        'media' => [
            'cropper_resize_image' => 'Resize image',
            'cropper_zoom' => 'Use mouse wheel to zoom in/out',
            'cropper_preview' => 'Preview result',
            'cropper_crop_upload' => 'Crop & Upload',
        ],
        'blog' => [
            'categories' => 'Categories',
            'media' => 'Media',
            'tab_available' => 'Available',
            'tab_upload' => 'Upload',
            'author' => 'Author',
            'filter_title' => 'Filter by title',
            'filter_name' => 'Filter by name',
            'delete_image' => 'Delete avatar',
            'click_featured' => 'Click on an image to make it the featured image for this post.',
            'image_uploaded' => 'Upload is complete.',
            'add_post' => 'Add post',
            'add_root_button' => 'Add root category',
            'add_tag_pholder' => 'Type enter to add tag, click to remove',
            'blog_post_excerpt' => 'Excerpt',
            'excerpt_label' => 'This user-defined summary of the post can be displayed on the front page.'
        ]
    ],
    'tables' => [
        'empty' => 'No data available.',
        'sort_asc' => 'Sort in ascending order',
        'sort_desc' => 'Sort in descending order',
        'select_item' => 'Select {name} for batch processing',
        'edit_item' => 'Edit {name}',
        'delete_item' => 'Delete {name}',
        'grouped_actions' => 'Grouped actions',
        'option_del_user' => 'Delete user',
        'option_del_blog' => 'Delete blog post',
        'btn_apply_title' => 'Apply action to all selected users'
    ],
    'dropzone' => [
        'choose_file' => 'Drag and drop your file here (or click to browse)',
        'max_size' => 'Maximum size:',
        'accepted_formats' => 'Accepted file formats: ',
        'file_too_big' => 'File is too big ({{filesize}} MB, maximum allowed: {{maxFilesize}} MB).',
        'invalid_type' => 'This file type is not allowed.',
        'response_error' => 'Server responded with code {{statusCode}}.',
        'cancel_upload' => 'Cancel upload',
        'cancel_confirm' => 'Confirm upload?',
        'remove_file' => '',
        'max_files_exceeded' => 'The maximum number of files was reached.',
        'delete_media' => 'Delete media',
        'edit_media' => 'Edit media'
    ],
    'locales' => [
        'en' => 'English',
        'fr' => 'French'
    ],
    'units' => [
        'MB' => 'MB'
    ],
    'go_home' => 'Go Home',
    'toggle_navigation' => 'Toggle navigation',
];
