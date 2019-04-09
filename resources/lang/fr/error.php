<?php return [
   'http' => [
      '401' => '__Non-authenticated users may not proceed.',
      '500' => [
         'general_error' => '__The operation caused an error. We\'ll be tracking the source of the problem shortly.',
         'general_retrieval_error' => '__The requested resource could not be retrieved. It may have been deleted.',
         'user_not_found' => '__We could not find a user by that username.',
         'group_not_found' => '__We could not find a group by that slug.',
         'blog_post_not_found' => '__We could not find a blog post by that name.',
      ],
      '422' => [
         'oauth_email_unverif' => '__The email address used to log in is not verified, therefore we cannot create an account 
          on this platform. We require a verified email address to get in touch with you if needed.',
      ],
      '403' => '__Access to this resource is forbidden.',
      '404' => '__Looks like we weren\'t able to locate that resource. Our apologies.',
      '405' => '__The platform cannot process a request with that method.',
      '419' => '__Your session has expired. Please log back in or refresh the page.',
      '429' => '__We are receiving too many requests at the moment. Please try again in a few moments.',
      '503' => '__Service unavailable. We are doing some cleanup.',
      'oauth_email' => '__The email associated with the account you used to log in already exists in our database.',
   ],
   'form' => [
      'identical_passwords' => '__The password you entered is identical to your previous password! Please enter a different password.',
      'wrong_password' => '__The current password you entered does not match what we have on record.',
      'posting_delay' => '__We enforce a two minute delay between posts. Please try again in a few moments.',
   ],
   'media' => [
      'no_file' => '__No file to process.',
      'type_size' => '__The file could not be processed. Make sure to check accepted file types and maximum sizes.',
      'wrong_type' => '__The target for this media was not recognized.',
      'entity_not_found' => '__The entity for which the media was uploaded could not be found.',
      'entity_type' => '__The ":type" image entity type does not match anything on record.',
      'media_type' => '__The media type ":type" does not match anything on disk.',
   ],

];