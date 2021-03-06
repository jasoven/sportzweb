<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - English
* Author: Nazmul Hasan
* Description:  English language file for Ion Auth messages and errors
*/

// Account Creation
$lang['account_creation_check_email_title']         = 'Check your email';
$lang['account_creation_check_junk_email']          = 'You may need to check your junk folder or spam';
$lang['account_creation_successful']                = 'Please click the link within your email account to complete your registration';
$lang['account_creation_unsuccessful']              = 'Unable to Create Account';
$lang['account_creation_duplicate_email']           = 'Email Already Used or Invalid';
$lang['account_creation_duplicate_username']        = 'Username Already Used or Invalid';

// Password
$lang['password_change_successful']                 = 'Password Successfully Changed';
$lang['password_change_unsuccessful']               = 'Unable to Change Password';
$lang['forgot_password_successful']                 = 'Password Reset Email Sent';
$lang['forgot_password_unsuccessful']               = 'Unable to Reset Password';

// Activation
$lang['activate_successful']                        = 'Account Activated';
$lang['activate_unsuccessful']                      = 'Unable to Activate Account';
$lang['deactivate_successful']                      = 'Account De-Activated';
$lang['deactivate_unsuccessful']                    = 'Unable to De-Activate Account';
$lang['activation_email_successful']                = 'Activation Email Sent';
$lang['activation_email_unsuccessful']              = 'Unable to Send Activation Email';

// Login / Logout
$lang['login_successful']                           = 'Logged In Successfully';
$lang['login_unsuccessful']                         = 'Incorrect Login';
$lang['login_unsuccessful_not_active']              = 'Account is inactive';
$lang['login_timeout']                              = 'Temporarily Locked Out.  Try again later.';
$lang['logout_successful']                          = 'Logged Out Successfully';

// Account Changes
$lang['update_successful']                          = 'Account Information Successfully Updated';
$lang['update_unsuccessful']                        = 'Unable to Update Account Information';
$lang['delete_successful']                          = 'User Deleted';
$lang['delete_unsuccessful']                        = 'Unable to Delete User';

// Groups
$lang['group_creation_successful']                  = 'Group created Successfully';
$lang['group_already_exists']                       = 'Group name already taken';
$lang['group_update_successful']                    = 'Group details updated';
$lang['group_delete_successful']                    = 'Group deleted';
$lang['group_delete_unsuccessful']                  = 'Unable to delete group';
$lang['group_name_required']                        = 'Group name is a required field';

// Email Subjects
$lang['email_forgotten_password_subject']           = 'Forgotten Password Verification';
$lang['email_new_password_subject']                 = 'New Password';
$lang['email_activation_subject']                   = 'Account Activation';

$lang['incorrect_security_answer']                  = 'Security quesstion\'s answer is incorrect';
$lang['invalid_email_address']                      = "Your provided email address is invalid.";

$lang['group_creation_duplicate_group_name']        = 'Group Name Already Used or Invalid.';
$lang['group_creation_success_message']             = 'Group is created successfully.';

//Score Prediction Application
$lang['create_sports_successful']                   = "Sports is created successfully";
$lang['update_sports_duplicate_title']              = "Sports Name Already used or invalid";
$lang['update_sports_unsuccessful']                 = "Unable to update sports info";
$lang['update_sports_successful']                   = "Sports is updated successfully";
$lang['delete_sports_unsuccessful']                 = "Unable to delete sports info";
$lang['delete_sports_successful']                   = "Sports is deleted successfully";

$lang['create_team_successful']                     = "Team is created successfully";
$lang['update_team_duplicate_title']                = "Team Name Already used or invalid";
$lang['update_team_unsuccessful']                   = "Unable to update team info";
$lang['update_team_successful']                     = "Team is updated successfully";
$lang['delete_team_unsuccessful']                   = "Unable to delete team info";
$lang['delete_team_successful']                     = "Team is deleted successfully";

$lang['create_tournament_successful']               = "Tournament is created successfully";
$lang['update_tournament_duplicate_title']          = "Tournament Name and season already used or invalid";
$lang['update_tournament_duplicate_season']         = "Tournament Name and season already used or invalid";
$lang['update_tournament_unsuccessful']             = "Unable to update tournament info";
$lang['update_tournament_successful']               = "Tournament is updated successfully";
$lang['delete_tournament_unsuccessful']             = "Unable to delete tournament info";
$lang['delete_tournament_successful']               = "Tournament is deleted successfully";

$lang['create_match_successful']                    = "Match is created successfully.";
$lang['create_match_unsuccessful']                  = "Unable to create a match.";
$lang['update_match_successful']                    = "Match is updated successfully.";
$lang['update_match_unsuccessful']                  = "Unable to update this match.";
$lang['delete_match_successful']                    = "Match is deleted successfully.";
$lang['delete_match_unsuccessful']                  = "Unable to delete a match.";

$lang['configure_homepage_successful']              = "Homepage is configured successfully";

//SHOP APPLICATION
$lang['create_product_category_duplicate_title']        = "Product Category title already used.";
$lang['create_product_category_successful']             = "Product Category is created successfully.";
$lang['create_product_category_fail']                   = "Failed to create Product Category.";
$lang['delete_product_category_successful']             = "Product Category is deleted successfully.";
$lang['delete_product_category_fail']                   = "Failed to delete Product Category.";
$lang['update_product_category_duplicate_title']        = "Product Category title already used.";
$lang['update_product_category_successful']             = "Product Category is updated successfully.";
$lang['update_product_category_fail']                   = "Failed to update Product Category.";

$lang['update_product_color_fail']                      = "Failed to update Product Color.";
$lang['update_product_color_successful']                = "Product Color is updated successfully.";
$lang['delete_product_color_fail']                      = "Failed to delete Product Color.";
$lang['delete_product_color_successful']                = "Product Color is deleted successfully.";
$lang['create_product_color_duplicate_title']           = "Product Color title already used.";
$lang['update_product_color_duplicate_title']           = "Product Color title already used.";
$lang['create_product_color_successful']                = "Product Color is created successfully.";
$lang['create_product_color_fail']                      = "Failed to create Product Color.";

$lang['create_product_size_duplicate_title']            = "Product Size title already used.";
$lang['create_product_size_successful']                 = "Product Size is created successfully.";
$lang['create_product_size_fail']                       = "Failed to create Product Size.";
$lang['delete_product_size_fail']                       = "Failed to delete Product Size.";
$lang['delete_product_size_successful']                 = "Product Size is deleted successfully.";
$lang['update_product_size_duplicate_title']            = "Product Size title already used.";
$lang['update_product_size_successful']                 = "Product Size is updated successfully.";
$lang['update_product_size_fail']                       = "Failed to update Product Size.";

$lang['update_product_feature_fail']                    = "Failed to update Product Feature.";
$lang['update_product_feature_successful']              = "Product Feature is updated successfully.";
$lang['delete_product_feature_fail']                    = "Failed to delete Product Feature.";
$lang['delete_product_feature_successful']              = "Product Feature is deleted successfully.";
$lang['create_product_feature_duplicate_title']         = "Product Feature title already used.";
$lang['update_product_feature_duplicate_title']         = "Product Feature title already used.";
$lang['create_product_feature_successful']              = "Product Feature is created successfully.";
$lang['create_product_feature_fail']                    = "Failed to create Product Feature.";

$lang['create_product_inform_successful']               = "Product Info is created successfully.";
$lang['create_product_inform_fail']                     = "Failed to create Product Info.";
$lang['delete_product_inform_successful']               = "Product Info is deleted successfully.";
$lang['delete_product_inform_fail']                     = "Failed to delete Product Info.";
$lang['update_product_inform_successful']               = "Product Info is updated successfully.";
$lang['update_product_inform_fail']                     = "Failed to update Product Info.";
$lang['create_product_inform_duplicate_title']          = "Product Info title already used.";
$lang['update_product_inform_duplicate_title']          = "Product Info title already used.";

$lang['create_account_types_duplicate_title']            = "Account Type title already used.";
$lang['create_account_types_successful']                 = "Account Type is created successfully.";
$lang['create_account_types_fail']                       = "Failed to create Account Type.";
$lang['delete_account_types_successful']                 = "Account Type is deleted successfully.";
$lang['delete_account_types_fail']                       = "Failed to delete Account Type.";
$lang['update_account_types_duplicate_title']            = "Account Type title already used.";
$lang['update_account_types_successful']                 = "Account Type is updated successfully.";
$lang['update_account_types_fail']                       = "Failed to update Account Type.";

$lang['create_clients_duplicate_title']            = "Client title already used.";
$lang['create_clients_successful']                 = "Client is created successfully.";
$lang['create_clients_fail']                       = "Failed to create Client.";
$lang['delete_clients_successful']                 = "Client is deleted successfully.";
$lang['delete_clients_fail']                       = "Failed to delete Client.";
$lang['update_clients_duplicate_title']            = "Client title already used.";
$lang['update_clients_successful']                 = "Client is updated successfully.";
$lang['update_clients_fail']                       = "Failed to update Client.";


$lang['create_health_questions_duplicate_title']            = "Health Question title already used.";
$lang['create_health_questions_successful']                 = "Health Question is created successfully.";
$lang['create_health_questions_fail']                       = "Failed to create Health Question.";
$lang['delete_health_questions_successful']                 = "Health Question is deleted successfully.";
$lang['delete_health_questions_fail']                       = "Failed to delete Health Question.";
$lang['update_health_questions_duplicate_title']            = "Health Question title already used.";
$lang['update_health_questions_successful']                 = "Health Question is updated successfully.";
$lang['update_health_questions_fail']                       = "Failed to update Health Question.";
$lang['create_recipe_selection_fail']                       = "Failed to create recipe selection.";
$lang['create_recipe_selection_successful']                 = "Recipe selection is created successfully.";


$lang['create_height_unit_types_duplicate_title']            = "Height unit type title already used.";
$lang['create_height_unit_types_successful']                 = "Height unit type is created successfully.";
$lang['create_height_unit_types_fail']                       = "Failed to create Height unit type.";
$lang['delete_height_unit_types_successful']                 = "Height unit type is deleted successfully.";
$lang['delete_height_unit_types_fail']                       = "Failed to delete Height unit type.";
$lang['update_height_unit_types_duplicate_title']            = "Height unit type title already used.";
$lang['update_height_unit_types_successful']                 = "Height unit type is updated successfully.";
$lang['update_height_unit_types_fail']                       = "Failed to update Height unit type.";


$lang['create_weight_unit_types_duplicate_title']            = "Width unit type title already used.";
$lang['create_weight_unit_types_successful']                 = "Width unit type is created successfully.";
$lang['create_weight_unit_types_fail']                       = "Failed to create Width unit type.";
$lang['delete_weight_unit_types_successful']                 = "Width unit type is deleted successfully.";
$lang['delete_weight_unit_types_fail']                       = "Failed to delete Width unit type.";
$lang['update_weight_unit_types_duplicate_title']            = "Width unit type title already used.";
$lang['update_weight_unit_types_successful']                 = "Width unit type is updated successfully.";
$lang['update_weight_unit_types_fail']                       = "Failed to update Width unit type.";


$lang['create_girth_unit_types_duplicate_title']            = "Girth unit type title already used.";
$lang['create_girth_unit_types_successful']                 = "Girth unit type is created successfully.";
$lang['create_girth_unit_types_fail']                       = "Failed to create Girth unit type.";
$lang['delete_girth_unit_types_successful']                 = "Girth unit type is deleted successfully.";
$lang['delete_girth_unit_types_fail']                       = "Failed to delete Girth unit type.";
$lang['update_girth_unit_types_duplicate_title']            = "Girth unit type title already used.";
$lang['update_girth_unit_types_successful']                 = "Girth unit type is updated successfully.";
$lang['update_girth_unit_types_fail']                       = "Failed to update Girth unit type.";


$lang['create_time_zones_duplicate_title']            = "Time Zone title already used.";
$lang['create_time_zones_successful']                 = "Time Zone is created successfully.";
$lang['create_time_zones_fail']                       = "Failed to create Time Zone.";
$lang['delete_time_zones_successful']                 = "Time Zone is deleted successfully.";
$lang['delete_time_zones_fail']                       = "Failed to delete Time Zone.";
$lang['update_time_zones_duplicate_title']            = "Time Zone title already used.";
$lang['update_time_zones_successful']                 = "Time Zone is updated successfully.";
$lang['update_time_zones_fail']                       = "Failed to update Time Zone.";


$lang['create_hourly_rates_duplicate_title']            = "Hourly Rates title already used.";
$lang['create_hourly_rates_successful']                 = "Hourly Rates is created successfully.";
$lang['create_hourly_rates_fail']                       = "Failed to create Hourly Rates.";
$lang['delete_hourly_rates_successful']                 = "Hourly Rates is deleted successfully.";
$lang['delete_hourly_rates_fail']                       = "Failed to delete Hourly Rates.";
$lang['update_hourly_rates_duplicate_title']            = "Hourly Rates title already used.";
$lang['update_hourly_rates_successful']                 = "Hourly Rates is updated successfully.";
$lang['update_hourly_rates_fail']                       = "Failed to update Hourly Rates.";


$lang['create_currencies_duplicate_title']            = "Currency title already used.";
$lang['create_currencies_successful']                 = "Currency is created successfully.";
$lang['create_currencies_fail']                       = "Failed to create Currency.";
$lang['delete_currencies_successful']                 = "Currency is deleted successfully.";
$lang['delete_currencies_fail']                       = "Failed to delete Currency.";
$lang['update_currencies_duplicate_title']            = "Currency title already used.";
$lang['update_currencies_successful']                 = "Currency is updated successfully.";
$lang['update_currencies_fail']                       = "Failed to update Currency.";


$lang['create_preferences_duplicate_title']            = "Preference title already used.";
$lang['create_preferences_successful']                 = "Preference is created successfully.";
$lang['create_preferences_fail']                       = "Failed to create Preference.";
$lang['delete_preferences_successful']                 = "Preference is deleted successfully.";
$lang['delete_preferences_fail']                       = "Failed to delete Preference.";
$lang['update_preferences_duplicate_title']            = "Preference title already used.";
$lang['update_preferences_successful']                 = "Preference is updated successfully.";
$lang['update_preferences_fail']                       = "Failed to update Preference.";


$lang['create_reviews_duplicate_title']            = "Review title already used.";
$lang['create_reviews_successful']                 = "Review is created successfully.";
$lang['create_reviews_fail']                       = "Failed to create Review.";
$lang['delete_reviews_successful']                 = "Review is deleted successfully.";
$lang['delete_reviews_fail']                       = "Failed to delete Review.";
$lang['update_reviews_duplicate_title']            = "Review title already used.";
$lang['update_reviews_successful']                 = "Review is updated successfully.";
$lang['update_reviews_fail']                       = "Failed to update Review.";


$lang['create_reassess_duplicate_title']            = "Reasses title already used.";
$lang['create_reassess_successful']                 = "Reasses is created successfully.";
$lang['create_reassess_fail']                       = "Failed to create Reasses.";
$lang['delete_reassess_successful']                 = "Reasses is deleted successfully.";
$lang['delete_reassess_fail']                       = "Failed to delete Reasses.";
$lang['update_reassess_duplicate_title']            = "Reasses title already used.";
$lang['update_reassess_successful']                 = "Reasses is updated successfully.";
$lang['update_reassess_fail']                       = "Failed to update Reasses.";


$lang['create_workouts_duplicate_title']            = "Workout title already used.";
$lang['create_workouts_successful']                 = "Workout is created successfully.";
$lang['create_workouts_fail']                       = "Failed to create Workout.";
$lang['delete_workouts_successful']                 = "Workout is deleted successfully.";
$lang['delete_workouts_fail']                       = "Failed to delete Workout.";
$lang['update_workouts_duplicate_title']            = "Workout title already used.";
$lang['update_workouts_successful']                 = "Workout is updated successfully.";
$lang['update_workouts_fail']                       = "Failed to update Workout.";


$lang['create_meal_times_duplicate_title']            = "Meal Time title already used.";
$lang['create_meal_times_successful']                 = "Meal Time is created successfully.";
$lang['create_meal_times_fail']                       = "Failed to create Meal Time.";
$lang['delete_meal_times_successful']                 = "Meal Time is deleted successfully.";
$lang['delete_meal_times_fail']                       = "Failed to delete Meal Time.";
$lang['update_meal_times_duplicate_title']            = "Meal Time title already used.";
$lang['update_meal_times_successful']                 = "Meal Time is updated successfully.";
$lang['update_meal_times_fail']                       = "Failed to update Meal Time.";


$lang['create_client_statuses_duplicate_title']            = "Client Status title already used.";
$lang['create_client_statuses_successful']                 = "Client Status is created successfully.";
$lang['create_client_statuses_fail']                       = "Failed to create Client Status.";
$lang['delete_client_statuses_successful']                 = "Client Status is deleted successfully.";
$lang['delete_client_statuses_fail']                       = "Failed to delete Client Status.";
$lang['update_client_statuses_duplicate_title']            = "Client Status title already used.";
$lang['update_client_statuses_successful']                 = "Client Status is updated successfully.";
$lang['update_client_statuses_fail']                       = "Failed to update Client Status.";


$lang['update_gympro_user_successful']                  = "Account is updated successfully.";
$lang['update_gympro_user_fail']                        = "Failed to update account info.";

$lang['create_client_successful']                       = "Client created successfully.";
$lang['create_client_fail']                             = "Failed to create a client.";
$lang['update_client_successful']                       = "Client updated successfully.";
$lang['update_client_fail']                             = "Failed to update client info.";
$lang['delete_client_successful']                       = "Client deleted successfully.";
$lang['delete_client_fail']                             = "Failed to delete the client.";

$lang['create_group_successful']                       = "Group created successfully.";
$lang['create_group_fail']                             = "Failed to create a group.";
$lang['update_group_successful']                       = "Group updated successfully.";
$lang['update_group_fail']                             = "Failed to update group info.";
$lang['delete_group_successful']                       = "Group deleted successfully.";
$lang['delete_group_fail']                             = "Failed to delete the group.";

$lang['create_session_successful']                       = "Session created successfully.";
$lang['create_session_fail']                             = "Failed to create a session.";
$lang['update_session_successful']                       = "Session updated successfully.";
$lang['update_session_fail']                             = "Failed to update session info.";
$lang['delete_session_successful']                       = "Session deleted successfully.";
$lang['delete_session_fail']                             = "Failed to delete the session.";

$lang['create_exercise_category_duplicate_title']      = "Exercise Category is already used.";
$lang['create_exercise_category_successful']           = "Exercise category created successfully.";
$lang['update_exercise_category_duplicate_title']      = "Exercise Category is already used.";
$lang['update_exercise_category_unsuccessful']         = "Failed to update exercise category.";
$lang['update_exercise_category_successful']           = "Exercise category updated successfully.";
$lang['create_program_successful']                     = "Program created successfully.";
$lang['create_program_fail']                           = "Failed to create a program.";
$lang['update_program_successful']                     = "Program updated successfully.";
$lang['update_program_fail']                           = "Failed to update program info.";
$lang['delete_program_successful']                     = "Program deleted successfully.";
$lang['delete_program_fail']                           = "Failed to delete program info.";

$lang['create_exercise_successful']                    = "Exercise created successfully.";
$lang['create_exercise_fail']                          = "Failed to create an exercise.";
$lang['update_exercise_successful']                    = "Exercise updated successfully.";
$lang['update_exercise_fail']                          = "Failed to update exercise info.";
$lang['delete_exercise_successful']                    = "Exercise deleted successfully.";
$lang['delete_exercise_fail']                          = "Failed to delete exercise info.";

$lang['create_nutrition_successful']                   = "Nutrition creaed successfully.";
$lang['create_nutrition_fail']                         = "Failed to create a nutrition.";
$lang['update_nutrition_successful']                   = "Nutrition updated successfully.";
$lang['update_nutrition_fail']                         = "Failed to update nutrition info.";
$lang['delete_nutrition_successful']                   = "Nutrition deleted successfully.";
$lang['delete_nutrition_fail']                         = "Failed to delete nutrition info.";

$lang['create_assessment_successful']                  = "Assessment created successfully.";
$lang['create_assessment_fail']                        = "Failed to create an Assessment.";
$lang['update_assessment_successful']                  = "Assessment updated successfully.";
$lang['update_assessment_fail']                        = "Failed to update Assessment info.";
$lang['delete_assessment_successful']                  = "Assessment deleted successfully.";
$lang['delete_assessment_fail']                         = "Failed to delete Assessment info.";

$lang['create_mission_successful']                     = "Mission created successfully.";
$lang['create_mission_fail']                           = "Failed to create a mission.";
$lang['update_mission_successful']                     = "Mission updated successfully.";
$lang['update_mission_fail']                           = "Failed to update mission info.";
$lang['delete_mission_successful']                     = "Mission deleted successfully.";
$lang['delete_mission_fail']                           = "Failed to delete mission info.";

$lang['create_photo_successful']                     = "Photo Uploaded successfully.";
$lang['create_photo_fail']                           = "Failed to create a photo.";
$lang['update_photo_successful']                     = "Photo updated successfully.";
$lang['update_photo_fail']                           = "Failed to update photo info.";
$lang['delete_photo_successful']                     = "Photo deleted successfully.";
$lang['delete_photo_fail']                           = "Failed to delete photo.";

$lang['create_login_attempts_successful']                     = "Login attempts Uploaded successfully.";
$lang['create_login_attempts_fail']                           = "Failed to create a login_attempts.";
$lang['update_login_attempts_successful']                     = "Login attempts updated successfully.";
$lang['update_login_attempts_fail']                           = "Failed to update login_attempts info.";
$lang['delete_login_attempts_successful']                     = "Login attempts deleted successfully.";
$lang['delete_login_attempts_fail']                           = "Failed to delete login_attempts.";

$lang['create_repeats_successful']      = "Repeat create successfully.";
$lang['create_repeats_fail']            = "Failed to create repeats info .";
$lang['update_repeats_successful']      = "Repeat updated successfully.";
$lang['update_repeats_fail']            = "Failed to update repeats info.";
$lang['delete_repeats_successful']      = "Repeat deleted successfully.";
$lang['delete_repeats_fail']            = "Failed to delete repeats.";

$lang['create_type_successful']         = "Type create successfully.";
$lang['create_type_fail']               = "Failed to create type info.";
$lang['update_type_successful']         = "Type updated successfully.";
$lang['update_type_fail']               = "Failed to update type info.";
$lang['delete_type_successful']         = "Type deleted successfully.";
$lang['delete_type_fail']               = "Failed to delete type.";

$lang['create_time_successful']         = "Time create successfully.";
$lang['create_time_fail']               = "Failed to create time info.";
$lang['update_time_successful']         = "Time updated successfully.";
$lang['update_time_fail']               = "Failed to update time info.";
$lang['delete_time_successful']         = "Time deleted successfully.";
$lang['delete_time_fail']               = "Failed to delete time.";

$lang['create_cost_successful']         = "Cost create successfully.";
$lang['create_cost_fail']               = "Failed to create cost info.";
$lang['update_cost_successful']         = "Cost updated successfully.";
$lang['update_cost_fail']               = "Failed to update cost info.";
$lang['delete_cost_successful']         = "Cost deleted successfully.";
$lang['delete_cost_fail']               = "Failed to delete cost.";

$lang['create_sessions_successful']       = "Sessions create successfully.";
$lang['create_sessions_fail']             = "Failed to create sessions info.";
$lang['update_sessions_fail']             = "No sessions has been updated.";
$lang['update_sessions_successful']       = "Sessions updated successfully.";
$lang['update_sessions_fail']             = "Failed to update sessions info.";
$lang['delete_sessions_successful']       = "Sessions deleted successfully.";
$lang['delete_sessions_fail']             = "Failed to delete sessions.";

$lang['create_feedback_successful']     = "Feedback create successfully.";
$lang['create_feedback_fail']           = "Failed to create feedback info.";
$lang['update_feedback_successful']     = "Feedback updated successfully.";
$lang['update_feedback_fail']           = "Failed to update feedback info.";
$lang['delete_feedback_successful']     = "Feedback deleted successfully.";
$lang['delete_feedback_fail']           = "Failed to delete feedback.";

$lang['contactus_msg_sent_successful']  = "Your message has been sent successfully.";
$lang['contactus_msg_sent_fail']        = "Failed to send Message.";

$lang['session_id_doesnt_exist']        = "Sorry, Session ID does not exist.";
$lang['user_sessionid_mismatch']        = "Sorry, you do not have permission to view this page.";

$lang['delete_news_category_successful']       = "News Category deleted successfully.";
$lang['delete_news_category_fail']             = "Failed to delete news category.";

$lang['delete_news_sub_category_successful']   = "News sub category deleted successfully.";
$lang['delete_news_sub_category_fail']         = "Failed to delete news sub category.";

$lang['delete_news_successful']   = "News deleted successfully.";
$lang['delete_news_fail']         = "Failed to delete news .";

$lang['sp_vote_successful']   = "Vote posted successfully.";
$lang['sp_vote_fail']         = "Failed to post vote.";
