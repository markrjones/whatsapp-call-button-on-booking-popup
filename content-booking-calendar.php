{\rtf1\ansi\ansicpg1252\cocoartf2761
\cocoatextscaling0\cocoaplatform0{\fonttbl\f0\fnil\fcharset0 Menlo-Regular;}
{\colortbl;\red255\green255\blue255;\red107\green0\blue1;\red255\green255\blue255;\red0\green0\blue0;
\red0\green0\blue255;\red144\green1\blue18;\red19\green118\blue70;\red15\green112\blue1;\red220\green0\blue5;
}
{\*\expandedcolortbl;;\cssrgb\c50196\c0\c0;\cssrgb\c100000\c100000\c100000;\cssrgb\c0\c0\c0;
\cssrgb\c0\c0\c100000;\cssrgb\c63922\c8235\c8235;\cssrgb\c3529\c52549\c34510;\cssrgb\c0\c50196\c0;\cssrgb\c89804\c0\c0;
}
\paperw11900\paperh16840\margl1440\margr1440\vieww11520\viewh8400\viewkind0
\deftab720
\pard\pardeftab720\partightenfactor0

\f0\fs24 \cf2 \cb3 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 <?php\cf0 \cb1 \strokec4 \
\pard\pardeftab720\partightenfactor0
\cf5 \cb3 \strokec5 if\cf0 \strokec4  (isset($data)) :\cb1 \
\
\
\cf5 \cb3 \strokec5 endif\cf0 \strokec4 ;\cb1 \
\cf5 \cb3 \strokec5 if\cf0 \strokec4  ($data->comment == \cf6 \strokec6 'owner reservations'\cf0 \strokec4 ) \{\cb1 \
\pard\pardeftab720\partightenfactor0
\cf0 \cb3     \cf5 \strokec5 return\cf0 \strokec4 ;\cb1 \
\cb3 \}\cb1 \
\cb3 $class = array();\cb1 \
\cb3 $tag = array();\cb1 \
\cb3 $show_approve = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3 $show_reject = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3 $show_cancel = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\
\cb3 $payment_method = \cf6 \strokec6 ''\cf0 \strokec4 ;\cb1 \
\pard\pardeftab720\partightenfactor0
\cf5 \cb3 \strokec5 if\cf0 \strokec4  (isset($data->order_id) && !empty($data->order_id) && $data->status == \cf6 \strokec6 'confirmed'\cf0 \strokec4 ) \{\cb1 \
\pard\pardeftab720\partightenfactor0
\cf0 \cb3     $payment_method = get_post_meta($data->order_id, \cf6 \strokec6 '_payment_method'\cf0 \strokec4 , \cf5 \strokec5 true\cf0 \strokec4 );\cb1 \
\cb3     \cf5 \strokec5 if\cf0 \strokec4  (get_option(\cf6 \strokec6 'listeo_disable_payments'\cf0 \strokec4 )) \{\cb1 \
\cb3         $payment_method = \cf6 \strokec6 'cod'\cf0 \strokec4 ;\cb1 \
\cb3     \}\cb1 \
\cb3 \}\cb1 \
\cb3 $_payment_option = get_post_meta($data->listing_id, \cf6 \strokec6 '_payment_option'\cf0 \strokec4 , \cf5 \strokec5 true\cf0 \strokec4 );\cb1 \
\pard\pardeftab720\partightenfactor0
\cf5 \cb3 \strokec5 if\cf0 \strokec4  (empty($_payment_option)) \{\cb1 \
\pard\pardeftab720\partightenfactor0
\cf0 \cb3     $_payment_option = \cf6 \strokec6 'pay_now'\cf0 \strokec4 ;\cb1 \
\cb3 \}\cb1 \
\pard\pardeftab720\partightenfactor0
\cf5 \cb3 \strokec5 if\cf0 \strokec4  ($_payment_option == \cf6 \strokec6 "pay_cash"\cf0 \strokec4 ) \{\cb1 \
\pard\pardeftab720\partightenfactor0
\cf0 \cb3     $payment_method = \cf6 \strokec6 'cod'\cf0 \strokec4 ;\cb1 \
\cb3 \}\cb1 \
\
\cb3 $show_contact = (get_option(\cf6 \strokec6 'listeo_lock_contact_info_to_paid_bookings'\cf0 \strokec4 )) ? \cf5 \strokec5 false\cf0 \strokec4  : \cf5 \strokec5 true\cf0 \strokec4 ;\cb1 \
\
\pard\pardeftab720\partightenfactor0
\cf5 \cb3 \strokec5 switch\cf0 \strokec4  ($data->status) \{\cb1 \
\pard\pardeftab720\partightenfactor0
\cf0 \cb3     \cf5 \strokec5 case\cf0 \strokec4  \cf6 \strokec6 'waiting'\cf0 \strokec4 :\cb1 \
\cb3         $class[] = \cf6 \strokec6 'waiting-booking'\cf0 \strokec4 ;\cb1 \
\cb3         $tag[] = \cf6 \strokec6 '<span class="booking-status pending">'\cf0 \strokec4  . esc_html__(\cf6 \strokec6 'Pending'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ) . \cf6 \strokec6 '</span>'\cf0 \strokec4 ;\cb1 \
\cb3         $show_approve = \cf5 \strokec5 true\cf0 \strokec4 ;\cb1 \
\cb3         $show_reject = \cf5 \strokec5 true\cf0 \strokec4 ;\cb1 \
\cb3         $show_renew = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         \cf5 \strokec5 break\cf0 \strokec4 ;\cb1 \
\
\cb3     \cf5 \strokec5 case\cf0 \strokec4  \cf6 \strokec6 'pay_to_confirm'\cf0 \strokec4 :\cb1 \
\cb3         $class[] = \cf6 \strokec6 'waiting-booking'\cf0 \strokec4 ;\cb1 \
\cb3         \cf5 \strokec5 if\cf0 \strokec4  ($data->price > \cf7 \strokec7 0\cf0 \strokec4 ) \{\cb1 \
\cb3             $tag[] = \cf6 \strokec6 '<span class="booking-status unpaid">'\cf0 \strokec4  . esc_html__(\cf6 \strokec6 'Waiting for user payment'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ) . \cf6 \strokec6 '</span>'\cf0 \strokec4 ;\cb1 \
\cb3         \}\cb1 \
\
\cb3         $show_approve = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_reject = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_renew = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_cancel = \cf5 \strokec5 true\cf0 \strokec4 ;\cb1 \
\cb3         \cf5 \strokec5 break\cf0 \strokec4 ;\cb1 \
\
\cb3     \cf5 \strokec5 case\cf0 \strokec4  \cf6 \strokec6 'confirmed'\cf0 \strokec4 :\cb1 \
\cb3         $class[] = \cf6 \strokec6 'approved-booking'\cf0 \strokec4 ;\cb1 \
\cb3         $tag[] = \cf6 \strokec6 '<span  class="booking-status">'\cf0 \strokec4  . esc_html__(\cf6 \strokec6 'Approved'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ) . \cf6 \strokec6 '</span>'\cf0 \strokec4 ;\cb1 \
\
\cb3         \cf5 \strokec5 if\cf0 \strokec4  ($data->price > \cf7 \strokec7 0\cf0 \strokec4 ) \{\cb1 \
\cb3             \cf5 \strokec5 if\cf0 \strokec4  ($_payment_option == \cf6 \strokec6 "pay_cash"\cf0 \strokec4 ) \{\cb1 \
\cb3                 $tag[] = \cf6 \strokec6 '<span class="booking-status unpaid">'\cf0 \strokec4  . esc_html__(\cf6 \strokec6 'Cash payment'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ) . \cf6 \strokec6 '</span>'\cf0 \strokec4 ;\cb1 \
\cb3             \} \cf5 \strokec5 else\cf0 \strokec4  \{\cb1 \
\cb3                 $tag[] = \cf6 \strokec6 '<span class="booking-status unpaid">'\cf0 \strokec4  . esc_html__(\cf6 \strokec6 'Unpaid'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ) . \cf6 \strokec6 '</span>'\cf0 \strokec4 ;\cb1 \
\cb3             \}\cb1 \
\cb3         \}\cb1 \
\
\cb3         $show_approve = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_reject = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_renew = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_cancel = \cf5 \strokec5 true\cf0 \strokec4 ;\cb1 \
\cb3         \cf5 \strokec5 break\cf0 \strokec4 ;\cb1 \
\
\cb3     \cf5 \strokec5 case\cf0 \strokec4  \cf6 \strokec6 'paid'\cf0 \strokec4 :\cb1 \
\
\cb3         $class[] = \cf6 \strokec6 'approved-booking'\cf0 \strokec4 ;\cb1 \
\cb3         $tag[] = \cf6 \strokec6 '<span class="booking-status">'\cf0 \strokec4  . esc_html__(\cf6 \strokec6 'Approved'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ) . \cf6 \strokec6 '</span>'\cf0 \strokec4 ;\cb1 \
\cb3         \cf5 \strokec5 if\cf0 \strokec4  ($data->price > \cf7 \strokec7 0\cf0 \strokec4 ) \{\cb1 \
\cb3             $tag[] = \cf6 \strokec6 '<span class="booking-status paid">'\cf0 \strokec4  . esc_html__(\cf6 \strokec6 'Paid'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ) . \cf6 \strokec6 '</span>'\cf0 \strokec4 ;\cb1 \
\cb3         \}\cb1 \
\cb3         $show_approve = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_renew = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_reject = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_cancel = \cf5 \strokec5 true\cf0 \strokec4 ;\cb1 \
\cb3         $show_contact = \cf5 \strokec5 true\cf0 \strokec4 ;\cb1 \
\cb3         \cf5 \strokec5 break\cf0 \strokec4 ;\cb1 \
\
\cb3     \cf5 \strokec5 case\cf0 \strokec4  \cf6 \strokec6 'cancelled'\cf0 \strokec4 :\cb1 \
\
\cb3         $class[] = \cf6 \strokec6 'canceled-booking'\cf0 \strokec4 ;\cb1 \
\cb3         $tag[] = \cf6 \strokec6 '<span class="booking-status">'\cf0 \strokec4  . esc_html__(\cf6 \strokec6 'Canceled'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ) . \cf6 \strokec6 '</span>'\cf0 \strokec4 ;\cb1 \
\cb3         $show_approve = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_reject = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_renew = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_delete = \cf5 \strokec5 true\cf0 \strokec4 ;\cb1 \
\cb3         \cf5 \strokec5 break\cf0 \strokec4 ;\cb1 \
\
\
\cb3     \cf5 \strokec5 case\cf0 \strokec4  \cf6 \strokec6 'expired'\cf0 \strokec4 :\cb1 \
\
\cb3         $class[] = \cf6 \strokec6 'expired-booking'\cf0 \strokec4 ;\cb1 \
\cb3         $tag[] = \cf6 \strokec6 '<span class="booking-status">'\cf0 \strokec4  . esc_html__(\cf6 \strokec6 'Expired'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ) . \cf6 \strokec6 '</span>'\cf0 \strokec4 ;\cb1 \
\cb3         $show_approve = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_reject = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_renew = \cf5 \strokec5 true\cf0 \strokec4 ;\cb1 \
\cb3         $show_delete = \cf5 \strokec5 true\cf0 \strokec4 ;\cb1 \
\cb3         \cf5 \strokec5 break\cf0 \strokec4 ;\cb1 \
\
\cb3     \cf5 \strokec5 default\cf0 \strokec4 :\cb1 \
\cb3         $show_approve = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_reject = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_renew = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $show_cancel = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         \cf5 \strokec5 break\cf0 \strokec4 ;\cb1 \
\cb3 \}\cb1 \
\
\pard\pardeftab720\partightenfactor0
\cf8 \cb3 \strokec8 //get order data\cf0 \cb1 \strokec4 \
\pard\pardeftab720\partightenfactor0
\cf5 \cb3 \strokec5 if\cf0 \strokec4  ($data->status != \cf6 \strokec6 'paid'\cf0 \strokec4  && isset($data->order_id) && !empty($data->order_id) && $data->status == \cf6 \strokec6 'confirmed'\cf0 \strokec4 ) \{\cb1 \
\pard\pardeftab720\partightenfactor0
\cf0 \cb3     $order = wc_get_order($data->order_id);\cb1 \
\cb3     \cf5 \strokec5 if\cf0 \strokec4  ($order) \{\cb1 \
\cb3         $payment_url = $order->get_checkout_payment_url();\cb1 \
\
\cb3         $order_data = $order->get_data();\cb1 \
\
\cb3         $order_status = $order_data[\cf6 \strokec6 'status'\cf0 \strokec4 ];\cb1 \
\cb3     \}\cb1 \
\cb3     \cf5 \strokec5 if\cf0 \strokec4  (\cf5 \strokec5 new\cf0 \strokec4  DateTime() > \cf5 \strokec5 new\cf0 \strokec4  DateTime($data->expiring)) \{\cb1 \
\cb3         $payment_url = \cf5 \strokec5 false\cf0 \strokec4 ;\cb1 \
\cb3         $class[] = \cf6 \strokec6 'expired-booking'\cf0 \strokec4 ;\cb1 \
\cb3         unset($tag[\cf7 \strokec7 1\cf0 \strokec4 ]);\cb1 \
\cb3         $tag[] = \cf6 \strokec6 '<span class="booking-status">'\cf0 \strokec4  . esc_html__(\cf6 \strokec6 'Expired'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ) . \cf6 \strokec6 '</span>'\cf0 \strokec4 ;\cb1 \
\cb3         $show_delete = \cf5 \strokec5 true\cf0 \strokec4 ;\cb1 \
\cb3     \}\cb1 \
\cb3 \}\cb1 \
\
\
\pard\pardeftab720\partightenfactor0
\cf2 \cb3 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cf2 \cb3 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "\cf2 \strokec2 <?php\cf0 \strokec4  echo implode(\cf6 \strokec6 ' '\cf0 \strokec4 , $class); \cf2 \strokec2 ?>\cf5 \strokec5 "\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "booking-list-\cf2 \strokec2 <?php\cf0 \strokec4  echo esc_attr($data->ID); \cf2 \strokec2 ?>\cf5 \strokec5 "\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\
\
\pard\pardeftab720\partightenfactor0
\cf0 \cb3     \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "list-box-listing bookings"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3         \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "list-box-listing-content"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3             \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "inner"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <h3\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "title"\cf2 \strokec2 ><a\cf0 \strokec4  \cf9 \strokec9 href\cf0 \strokec4 =\cf5 \strokec5 "\cf2 \strokec2 <?php\cf0 \strokec4  echo get_permalink($data->listing_id); \cf2 \strokec2 ?>\cf5 \strokec5 "\cf2 \strokec2 ><?php\cf0 \strokec4  echo get_the_title($data->listing_id); \cf2 \strokec2 ?></a>\cf0 \strokec4  \cf2 \strokec2 <?php\cf0 \strokec4  echo implode(\cf6 \strokec6 ' '\cf0 \strokec4 , $tag); \cf2 \strokec2 ?></h3>\cf0 \cb1 \strokec4 \
\
\cb3                 \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "inner-booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 <h5><?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Booking Date:'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></h5>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 <ul\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <?php\cf0 \cb1 \strokec4 \
\cb3                         \cf8 \strokec8 //get post type to show proper date\cf0 \cb1 \strokec4 \
\cb3                         $listing_type = get_post_meta($data->listing_id, \cf6 \strokec6 '_listing_type'\cf0 \strokec4 , \cf5 \strokec5 true\cf0 \strokec4 );\cb1 \
\
\cb3                         \cf5 \strokec5 if\cf0 \strokec4  ($listing_type == \cf6 \strokec6 'rental'\cf0 \strokec4 ) \{ \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "highlighted"\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "date"\cf2 \strokec2 ><?php\cf0 \strokec4  echo date_i18n(get_option(\cf6 \strokec6 'date_format'\cf0 \strokec4 ), strtotime($data->date_start)); \cf2 \strokec2 ?>\cf0 \strokec4  - \cf2 \strokec2 <?php\cf0 \strokec4  echo date_i18n(get_option(\cf6 \strokec6 'date_format'\cf0 \strokec4 ), strtotime($data->date_end)); \cf2 \strokec2 ?></li>\cf0 \cb1 \strokec4 \
\
\cb3                         \cf2 \strokec2 <?php\cf0 \strokec4  \} \cf5 \strokec5 else\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  ($listing_type == \cf6 \strokec6 'service'\cf0 \strokec4 ) \{\cb1 \
\cb3                         \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "highlighted"\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "date"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  echo date_i18n(get_option(\cf6 \strokec6 'date_format'\cf0 \strokec4 ), strtotime($data->date_start)); \cf2 \strokec2 ?>\cf0 \strokec4  \cf2 \strokec2 <?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'at'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \cb1 \strokec4 \
\cb3                                 $time_start = date_i18n(get_option(\cf6 \strokec6 'time_format'\cf0 \strokec4 ), strtotime($data->date_start));\cb1 \
\cb3                                 $time_end = date_i18n(get_option(\cf6 \strokec6 'time_format'\cf0 \strokec4 ), strtotime($data->date_end)); \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  echo $time_start \cf2 \strokec2 ?>\cf0 \strokec4  \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  ($time_start != $time_end) echo \cf6 \strokec6 '- '\cf0 \strokec4  . $time_end; \cf2 \strokec2 ?></li>\cf0 \cb1 \strokec4 \
\
\cb3                         \cf2 \strokec2 <?php\cf0 \strokec4  \} \cf5 \strokec5 else\cf0 \strokec4  \{\cb1 \
\cb3                             \cf8 \strokec8 //event \cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "highlighted"\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "date"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \cb1 \strokec4 \
\cb3                                 $meta_value = get_post_meta($data->listing_id, \cf6 \strokec6 '_event_date'\cf0 \strokec4 , \cf5 \strokec5 true\cf0 \strokec4 );\cb1 \
\cb3                                 $meta_value_date = explode(\cf6 \strokec6 ' '\cf0 \strokec4 , $meta_value, \cf7 \strokec7 2\cf0 \strokec4 );\cb1 \
\
\cb3                                 $meta_value_date[\cf7 \strokec7 0\cf0 \strokec4 ] = str_replace(\cf6 \strokec6 '/'\cf0 \strokec4 , \cf6 \strokec6 '-'\cf0 \strokec4 , $meta_value_date[\cf7 \strokec7 0\cf0 \strokec4 ]);\cb1 \
\cb3                                 $meta_value = date_i18n(get_option(\cf6 \strokec6 'date_format'\cf0 \strokec4 ), strtotime($meta_value_date[\cf7 \strokec7 0\cf0 \strokec4 ]));\cb1 \
\
\
\cb3                                 \cf8 \strokec8 //echo strtotime(end($meta_value_date));\cf0 \cb1 \strokec4 \
\cb3                                 \cf8 \strokec8 //echo date( get_option( 'time_format' ), strtotime(end($meta_value_date)));\cf0 \cb1 \strokec4 \
\cb3                                 \cf5 \strokec5 if\cf0 \strokec4  (isset($meta_value_date[\cf7 \strokec7 1\cf0 \strokec4 ])) \{\cb1 \
\cb3                                     $time = str_replace(\cf6 \strokec6 '-'\cf0 \strokec4 , \cf6 \strokec6 ''\cf0 \strokec4 , $meta_value_date[\cf7 \strokec7 1\cf0 \strokec4 ]);\cb1 \
\cb3                                     $meta_value .= esc_html__(\cf6 \strokec6 ' at '\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 );\cb1 \
\cb3                                     $meta_value .= date_i18n(get_option(\cf6 \strokec6 'time_format'\cf0 \strokec4 ), strtotime($time));\cb1 \
\cb3                                 \}\cb1 \
\cb3                                 echo $meta_value;\cb1 \
\
\cb3                                 $meta_value = get_post_meta($data->listing_id, \cf6 \strokec6 '_event_date_end'\cf0 \strokec4 , \cf5 \strokec5 true\cf0 \strokec4 );\cb1 \
\cb3                                 \cf5 \strokec5 if\cf0 \strokec4  (isset($meta_value) && !empty($meta_value)) :\cb1 \
\
\cb3                                     $meta_value_date = explode(\cf6 \strokec6 ' '\cf0 \strokec4 , $meta_value, \cf7 \strokec7 2\cf0 \strokec4 );\cb1 \
\
\cb3                                     $meta_value_date[\cf7 \strokec7 0\cf0 \strokec4 ] = str_replace(\cf6 \strokec6 '/'\cf0 \strokec4 , \cf6 \strokec6 '-'\cf0 \strokec4 , $meta_value_date[\cf7 \strokec7 0\cf0 \strokec4 ]);\cb1 \
\cb3                                     $meta_value = date_i18n(get_option(\cf6 \strokec6 'date_format'\cf0 \strokec4 ), strtotime($meta_value_date[\cf7 \strokec7 0\cf0 \strokec4 ]));\cb1 \
\
\
\cb3                                     \cf8 \strokec8 //echo strtotime(end($meta_value_date));\cf0 \cb1 \strokec4 \
\cb3                                     \cf8 \strokec8 //echo date( get_option( 'time_format' ), strtotime(end($meta_value_date)));\cf0 \cb1 \strokec4 \
\cb3                                     \cf5 \strokec5 if\cf0 \strokec4  (isset($meta_value_date[\cf7 \strokec7 1\cf0 \strokec4 ])) \{\cb1 \
\cb3                                         $time = str_replace(\cf6 \strokec6 '-'\cf0 \strokec4 , \cf6 \strokec6 ''\cf0 \strokec4 , $meta_value_date[\cf7 \strokec7 1\cf0 \strokec4 ]);\cb1 \
\cb3                                         $meta_value .= esc_html__(\cf6 \strokec6 ' at '\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 );\cb1 \
\cb3                                         $meta_value .= date_i18n(get_option(\cf6 \strokec6 'time_format'\cf0 \strokec4 ), strtotime($time));\cb1 \
\cb3                                     \}\cb1 \
\cb3                                     echo \cf6 \strokec6 ' - '\cf0 \strokec4  . $meta_value; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 </li>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <?php\cf0 \strokec4  \}\cb1 \
\cb3                         \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3                     \cf2 \strokec2 </ul>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  $details = json_decode($data->comment);\cb1 \
\cb3                 \cf5 \strokec5 if\cf0 \strokec4  (\cb1 \
\cb3                     (isset($details->childrens) && $details->childrens > \cf7 \strokec7 0\cf0 \strokec4 )\cb1 \
\cb3                     ||\cb1 \
\cb3                     (isset($details->adults) && $details->adults > \cf7 \strokec7 0\cf0 \strokec4 )\cb1 \
\cb3                     ||\cb1 \
\cb3                     (isset($details->tickets) && $details->tickets > \cf7 \strokec7 0\cf0 \strokec4 )\cb1 \
\cb3                 ) \{ \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "inner-booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <h5><?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Booking Details:'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></h5>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <ul\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "highlighted"\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "details"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($details->childrens) && $details->childrens > \cf7 \strokec7 0\cf0 \strokec4 ) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                     \cf2 \strokec2 <?php\cf0 \strokec4  printf(_n(\cf6 \strokec6 '%d Child'\cf0 \strokec4 , \cf6 \strokec6 '%s Children'\cf0 \strokec4 , $details->childrens, \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ), $details->childrens) \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($details->adults)  && $details->adults > \cf7 \strokec7 0\cf0 \strokec4 ) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                     \cf2 \strokec2 <?php\cf0 \strokec4  printf(_n(\cf6 \strokec6 '%d Guest'\cf0 \strokec4 , \cf6 \strokec6 '%s Guests'\cf0 \strokec4 , $details->adults, \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ), $details->adults) \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($details->tickets)  && $details->tickets > \cf7 \strokec7 0\cf0 \strokec4 ) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                     \cf2 \strokec2 <?php\cf0 \strokec4  printf(_n(\cf6 \strokec6 '%d Ticket'\cf0 \strokec4 , \cf6 \strokec6 '%s Tickets'\cf0 \strokec4 , $details->tickets, \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ), $details->tickets) \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 </li>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 </ul>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \} \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3                 \cf2 \strokec2 <?php\cf0 \cb1 \strokec4 \
\cb3                 $currency_abbr = get_option(\cf6 \strokec6 'listeo_currency'\cf0 \strokec4 );\cb1 \
\cb3                 $currency_postion = get_option(\cf6 \strokec6 'listeo_currency_postion'\cf0 \strokec4 );\cb1 \
\cb3                 $currency_symbol = Listeo_Core_Listing::get_currency_symbol($currency_abbr);\cb1 \
\cb3                 $decimals = get_option(\cf6 \strokec6 'listeo_number_decimals'\cf0 \strokec4 , \cf7 \strokec7 2\cf0 \strokec4 );\cb1 \
\
\cb3                 \cf5 \strokec5 if\cf0 \strokec4  ($data->price) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "inner-booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <h5><?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Price:'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></h5>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <ul\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "highlighted"\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "price"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  ($currency_postion == \cf6 \strokec6 'before'\cf0 \strokec4 ) \{\cb1 \
\cb3                                     echo $currency_symbol . \cf6 \strokec6 ' '\cf0 \strokec4 ;\cb1 \
\cb3                                 \}\cb1 \
\cb3                                 \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \cb1 \strokec4 \
\cb3                                 \cf5 \strokec5 if\cf0 \strokec4  (is_numeric($data->price)) \{\cb1 \
\cb3                                     echo number_format_i18n($data->price, $decimals);\cb1 \
\cb3                                 \} \cf5 \strokec5 else\cf0 \strokec4  \{\cb1 \
\cb3                                     echo esc_html($data->price);\cb1 \
\cb3                                 \}; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  ($currency_postion == \cf6 \strokec6 'after'\cf0 \strokec4 ) \{\cb1 \
\cb3                                     echo \cf6 \strokec6 ' '\cf0 \strokec4  . $currency_symbol;\cb1 \
\cb3                                 \}  \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 </li>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 </ul>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <?php\cf0 \cb1 \strokec4 \
\
\cb3                 \cf5 \strokec5 if\cf0 \strokec4  ($show_contact) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "inner-booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\
\cb3                         \cf2 \strokec2 <h5><?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Client:'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></h5>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <ul\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "booking-list"\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "client"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($details->first_name) || isset($details->last_name)) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "name"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                                     \cf2 \strokec2 <a\cf0 \strokec4  \cf9 \strokec9 href\cf0 \strokec4 =\cf5 \strokec5 "\cf2 \strokec2 <?php\cf0 \strokec4  echo get_author_posts_url($data->bookings_author); \cf2 \strokec2 ?>\cf5 \strokec5 "\cf2 \strokec2 ><?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($details->first_name)) echo esc_html(stripslashes($details->first_name)); \cf2 \strokec2 ?>\cf0 \strokec4  \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($details->last_name)) echo esc_html(stripslashes($details->last_name)); \cf2 \strokec2 ?></a>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 </li>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  ($show_contact && isset($details->email)) : \cf2 \strokec2 ?><li\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "email"\cf2 \strokec2 ><a\cf0 \strokec4  \cf9 \strokec9 href\cf0 \strokec4 =\cf5 \strokec5 "mailto:\cf2 \strokec2 <?php\cf0 \strokec4  echo esc_attr($details->email) \cf2 \strokec2 ?>\cf5 \strokec5 "\cf2 \strokec2 ><?php\cf0 \strokec4  echo esc_html($details->email); \cf2 \strokec2 ?></a></li>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  ($show_contact && isset($details->phone)) : \cf2 \strokec2 ?><li\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "phone"\cf2 \strokec2 ><a\cf0 \strokec4  \cf9 \strokec9 href\cf0 \strokec4 =\cf5 \strokec5 "tel:\cf2 \strokec2 <?php\cf0 \strokec4  echo esc_attr($details->phone) \cf2 \strokec2 ?>\cf5 \strokec5 "\cf2 \strokec2 ><?php\cf0 \strokec4  echo esc_html($details->phone); \cf2 \strokec2 ?></a></li>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 </ul>\cf0 \cb1 \strokec4 \
\
\cb3                     \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3                 \cf2 \strokec2 <?php\cf0 \cb1 \strokec4 \
\
\cb3                 \cf5 \strokec5 if\cf0 \strokec4  ($show_contact && isset($details->billing_address_1) && !empty($details->billing_address_1)) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "inner-booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\
\cb3                         \cf2 \strokec2 <h5><?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Address:'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></h5>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <ul\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "booking-list"\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "client"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($details->billing_address_1)) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "billing_address_1"\cf2 \strokec2 ><?php\cf0 \strokec4  echo esc_html(stripslashes($details->billing_address_1)); \cf2 \strokec2 ?>\cf0 \strokec4  \cf2 \strokec2 </li>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($details->billing_address_1)) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "billing_postcode"\cf2 \strokec2 ><?php\cf0 \strokec4  echo esc_html(stripslashes($details->billing_postcode)); \cf2 \strokec2 ?>\cf0 \strokec4  \cf2 \strokec2 </li>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($details->billing_city)) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "billing_city"\cf2 \strokec2 ><?php\cf0 \strokec4  echo esc_html(stripslashes($details->billing_city)); \cf2 \strokec2 ?>\cf0 \strokec4  \cf2 \strokec2 </li>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($details->billing_country)) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "billing_country"\cf2 \strokec2 ><?php\cf0 \strokec4  echo esc_html(stripslashes($details->billing_country)); \cf2 \strokec2 ?>\cf0 \strokec4  \cf2 \strokec2 </li>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3                         \cf2 \strokec2 </ul>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($details->service) && !empty($details->service)) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "inner-booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <h5><?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Extra Services:'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></h5>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <?php\cf0 \strokec4  echo listeo_get_extra_services_html($details->service); \cf8 \strokec8 //echo wpautop( $details->service); \cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($details->message) && !empty($details->message)) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "inner-booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <h5><?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Message:'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></h5>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <?php\cf0 \strokec4  echo wpautop(esc_html(stripslashes($details->message))); \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\
\cb3                 \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "inner-booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 <h5><?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Request sent:'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></h5>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 <ul\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "highlighted"\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "price"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  echo date_i18n(get_option(\cf6 \strokec6 'date_format'\cf0 \strokec4 ), strtotime($data->created)); \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <?php\cf0 \cb1 \strokec4 \
\cb3                             $date_created = explode(\cf6 \strokec6 ' '\cf0 \strokec4 , $data->created);\cb1 \
\cb3                             \cf5 \strokec5 if\cf0 \strokec4  (isset($date_created[\cf7 \strokec7 1\cf0 \strokec4 ])) \{ \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'at'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3                             \cf2 \strokec2 <?php\cf0 \strokec4  echo date_i18n(get_option(\cf6 \strokec6 'time_format'\cf0 \strokec4 ), strtotime($date_created[\cf7 \strokec7 1\cf0 \strokec4 ]));\cb1 \
\cb3                             \} \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 </li>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 </ul>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($data->expiring) && $data->expiring != \cf6 \strokec6 '0000-00-00 00:00:00'\cf0 \strokec4  && $data->expiring != $data->created) \{ \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "inner-booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <h5><?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Payment due:'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></h5>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <ul\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "highlighted"\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "payment_due"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  echo date_i18n(get_option(\cf6 \strokec6 'date_format'\cf0 \strokec4 ), strtotime($data->expiring)); \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <?php\cf0 \cb1 \strokec4 \
\cb3                                 $date_expiring = explode(\cf6 \strokec6 ' '\cf0 \strokec4 , $data->expiring);\cb1 \
\cb3                                 \cf5 \strokec5 if\cf0 \strokec4  (isset($date_expiring[\cf7 \strokec7 1\cf0 \strokec4 ])) \{ \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                     \cf2 \strokec2 <?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'at'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3                                 \cf2 \strokec2 <?php\cf0 \strokec4  echo date_i18n(get_option(\cf6 \strokec6 'time_format'\cf0 \strokec4 ), strtotime($date_expiring[\cf7 \strokec7 1\cf0 \strokec4 ]));\cb1 \
\cb3                                 \} \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 </li>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 </ul>\cf0 \cb1 \strokec4 \
\cb3                     \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \} \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($data->order_id)) \{\cb1 \
\cb3                     $order = wc_get_order($data->order_id);\cb1 \
\cb3                     \cf5 \strokec5 if\cf0 \strokec4  ($order) \{ \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "inner-booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <h5><?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Order ID:'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></h5>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 <ul\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "highlighted"\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "order"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                                     #\cf2 \strokec2 <?php\cf0 \strokec4  echo $data->order_id;\cb1 \
\cb3                                         echo \cf6 \strokec6 " "\cf0 \strokec4 ;\cb1 \
\cb3                                         echo $order->get_billing_first_name();\cb1 \
\cb3                                         echo \cf6 \strokec6 " "\cf0 \strokec4 ;\cb1 \
\cb3                                         echo $order->get_billing_last_name(); \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 </li>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 </ul>\cf0 \cb1 \strokec4 \
\cb3                         \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \}\cb1 \
\cb3                 \} \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3                 \cf8 \strokec8 <!-- Cusotm fields -->\cf0 \cb1 \strokec4 \
\cb3                 \cf2 \strokec2 <?php\cf0 \cb1 \strokec4 \
\cb3                 $fields = get_option(\cf6 \strokec6 "listeo_\{$listing_type\}_booking_fields"\cf0 \strokec4 );\cb1 \
\cb3                 \cf5 \strokec5 if\cf0 \strokec4  ($fields) \{\cb1 \
\
\
\cb3                     \cf5 \strokec5 foreach\cf0 \strokec4  ($fields as $field) \{\cb1 \
\cb3                         \cf5 \strokec5 if\cf0 \strokec4  ($field[\cf6 \strokec6 'type'\cf0 \strokec4 ] == \cf6 \strokec6 'header'\cf0 \strokec4 ) \{\cb1 \
\cb3                             \cf5 \strokec5 continue\cf0 \strokec4 ;\cb1 \
\cb3                         \}\cb1 \
\cb3                         $meta = get_booking_meta($data->ID, $field[\cf6 \strokec6 'id'\cf0 \strokec4 ]);\cb1 \
\cb3                         \cf5 \strokec5 if\cf0 \strokec4  (!empty($meta)) \{ \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3                             \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "inner-booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <h5><?php\cf0 \strokec4  echo $field[\cf6 \strokec6 'name'\cf0 \strokec4 ] \cf2 \strokec2 ?></h5>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 <ul\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "booking-list"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                                     \cf2 \strokec2 <li\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "\cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  ($field[\cf6 \strokec6 'type'\cf0 \strokec4 ] == \cf6 \strokec6 'checkbox'\cf0 \strokec4 ) \{\cb1 \
\cb3                                                     echo \cf6 \strokec6 'checkboxed'\cf0 \strokec4 ;\cb1 \
\cb3                                                     $meta = \cf6 \strokec6 ''\cf0 \strokec4 ;\cb1 \
\cb3                                                 \} \cf2 \strokec2 ?>\cf5 \strokec5  "\cf0 \strokec4  \cf9 \strokec9 id\cf0 \strokec4 =\cf5 \strokec5 "\cf2 \strokec2 <?php\cf0 \strokec4  echo $field[\cf6 \strokec6 'type'\cf0 \strokec4 ]; \cf2 \strokec2 ?>\cf5 \strokec5 "\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3                                         \cf2 \strokec2 <?php\cf0 \cb1 \strokec4 \
\cb3                                         \cf5 \strokec5 if\cf0 \strokec4  (is_array($meta)) \{\cb1 \
\cb3                                             $i = \cf7 \strokec7 0\cf0 \strokec4 ;\cb1 \
\cb3                                             $last =  count($meta);\cb1 \
\cb3                                             \cf5 \strokec5 foreach\cf0 \strokec4  ($meta as $key) \{\cb1 \
\cb3                                                 $i++;\cb1 \
\cb3                                                 echo $field[\cf6 \strokec6 'options'\cf0 \strokec4 ][$key];\cb1 \
\cb3                                                 \cf5 \strokec5 if\cf0 \strokec4  ($i >= \cf7 \strokec7 0\cf0 \strokec4  && $i < $last) : echo \cf6 \strokec6 ", "\cf0 \strokec4 ;\cb1 \
\cb3                                                 \cf5 \strokec5 endif\cf0 \strokec4 ;\cb1 \
\cb3                                             \}\cb1 \
\cb3                                         \} \cf5 \strokec5 else\cf0 \strokec4  \{\cb1 \
\cb3                                             \cf5 \strokec5 switch\cf0 \strokec4  ($field[\cf6 \strokec6 'type'\cf0 \strokec4 ]) \{\cb1 \
\cb3                                                 \cf5 \strokec5 case\cf0 \strokec4  \cf6 \strokec6 'file'\cf0 \strokec4 :\cb1 \
\cb3                                                     echo \cf6 \strokec6 '<a href="'\cf0 \strokec4  . $meta . \cf6 \strokec6 '" /> '\cf0 \strokec4  . esc_html__(\cf6 \strokec6 'Download'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ) . \cf6 \strokec6 ' '\cf0 \strokec4  . wp_basename($meta) . \cf6 \strokec6 ' </a></li>'\cf0 \strokec4 ;\cb1 \
\cb3                                                     \cf5 \strokec5 break\cf0 \strokec4 ;\cb1 \
\
\cb3                                                 \cf5 \strokec5 case\cf0 \strokec4  \cf6 \strokec6 'radio'\cf0 \strokec4 :\cb1 \
\cb3                                                     echo $field[\cf6 \strokec6 'options'\cf0 \strokec4 ][$meta];\cb1 \
\cb3                                                     \cf5 \strokec5 break\cf0 \strokec4 ;\cb1 \
\cb3                                                 \cf5 \strokec5 case\cf0 \strokec4  \cf6 \strokec6 'select'\cf0 \strokec4 :\cb1 \
\cb3                                                     echo $field[\cf6 \strokec6 'options'\cf0 \strokec4 ][$meta];\cb1 \
\cb3                                                     \cf5 \strokec5 break\cf0 \strokec4 ;\cb1 \
\
\cb3                                                 \cf5 \strokec5 default\cf0 \strokec4 :\cb1 \
\cb3                                                     echo $meta;\cb1 \
\cb3                                                     \cf5 \strokec5 break\cf0 \strokec4 ;\cb1 \
\cb3                                             \}\cb1 \
\cb3                                         \} \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3                                     \cf2 \strokec2 </li>\cf0 \cb1 \strokec4 \
\cb3                                 \cf2 \strokec2 </ul>\cf0 \cb1 \strokec4 \
\cb3                             \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\
\cb3                 \cf2 \strokec2 <?php\cf0 \strokec4  \}\cb1 \
\cb3                     \}\cb1 \
\cb3                 \}\cb1 \
\cb3                 \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\
\
\cb3             \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\cb3         \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\cb3     \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\cb3     \cf2 \strokec2 <div\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "buttons-to-down booking-buttons-actions"\cf2 \strokec2 >\cf0 \cb1 \strokec4 \
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  ($payment_method == \cf6 \strokec6 'cod'\cf0 \strokec4 ) \{ \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3             \cf2 \strokec2 <a\cf0 \strokec4  \cf9 \strokec9 href\cf0 \strokec4 =\cf5 \strokec5 "#"\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "button gray mark-as-paid"\cf0 \strokec4  \cf9 \strokec9 data-booking_id\cf0 \strokec4 =\cf5 \strokec5 "\cf2 \strokec2 <?php\cf0 \strokec4  echo esc_attr($data->ID); \cf2 \strokec2 ?>\cf5 \strokec5 "\cf2 \strokec2 ><i\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "sl sl-icon-check"\cf2 \strokec2 ></i>\cf0 \strokec4  \cf2 \strokec2 <?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Confirm Payment'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></a>\cf0 \cb1 \strokec4 \
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \} \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  ($show_reject) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3             \cf2 \strokec2 <a\cf0 \strokec4  \cf9 \strokec9 href\cf0 \strokec4 =\cf5 \strokec5 "#"\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "button gray reject"\cf0 \strokec4  \cf9 \strokec9 data-booking_id\cf0 \strokec4 =\cf5 \strokec5 "\cf2 \strokec2 <?php\cf0 \strokec4  echo esc_attr($data->ID); \cf2 \strokec2 ?>\cf5 \strokec5 "\cf2 \strokec2 ><i\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "sl sl-icon-close"\cf2 \strokec2 ></i>\cf0 \strokec4  \cf2 \strokec2 <?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Reject'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></a>\cf0 \cb1 \strokec4 \
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  ($show_cancel) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3             \cf2 \strokec2 <a\cf0 \strokec4  \cf9 \strokec9 href\cf0 \strokec4 =\cf5 \strokec5 "#"\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "button gray cancel"\cf0 \strokec4  \cf9 \strokec9 data-booking_id\cf0 \strokec4 =\cf5 \strokec5 "\cf2 \strokec2 <?php\cf0 \strokec4  echo esc_attr($data->ID); \cf2 \strokec2 ?>\cf5 \strokec5 "\cf2 \strokec2 ><i\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "sl sl-icon-close"\cf2 \strokec2 ></i>\cf0 \strokec4  \cf2 \strokec2 <?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Cancel'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></a>\cf0 \cb1 \strokec4 \
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  (isset($show_delete) && $show_delete == \cf5 \strokec5 true\cf0 \strokec4 ) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3             \cf2 \strokec2 <a\cf0 \strokec4  \cf9 \strokec9 href\cf0 \strokec4 =\cf5 \strokec5 "#"\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "button gray delete"\cf0 \strokec4  \cf9 \strokec9 data-booking_id\cf0 \strokec4 =\cf5 \strokec5 "\cf2 \strokec2 <?php\cf0 \strokec4  echo esc_attr($data->ID); \cf2 \strokec2 ?>\cf5 \strokec5 "\cf2 \strokec2 ><i\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "sl sl-icon-trash"\cf2 \strokec2 ></i>\cf0 \strokec4  \cf2 \strokec2 <?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Delete'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></a>\cf0 \cb1 \strokec4 \
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  ($show_approve) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3             \cf2 \strokec2 <a\cf0 \strokec4  \cf9 \strokec9 href\cf0 \strokec4 =\cf5 \strokec5 "#"\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "button gray approve"\cf0 \strokec4  \cf9 \strokec9 data-booking_id\cf0 \strokec4 =\cf5 \strokec5 "\cf2 \strokec2 <?php\cf0 \strokec4  echo esc_attr($data->ID); \cf2 \strokec2 ?>\cf5 \strokec5 "\cf2 \strokec2 ><i\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "sl sl-icon-check"\cf2 \strokec2 ></i>\cf0 \strokec4  \cf2 \strokec2 <?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Approve'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></a>\cf0 \cb1 \strokec4 \
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 if\cf0 \strokec4  ($show_renew) : \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3             \cf2 \strokec2 <a\cf0 \strokec4  \cf9 \strokec9 href\cf0 \strokec4 =\cf5 \strokec5 "#"\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "button gray renew_booking"\cf0 \strokec4  \cf9 \strokec9 data-booking_id\cf0 \strokec4 =\cf5 \strokec5 "\cf2 \strokec2 <?php\cf0 \strokec4  echo esc_attr($data->ID); \cf2 \strokec2 ?>\cf5 \strokec5 "\cf2 \strokec2 ><i\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "sl sl-icon-check"\cf2 \strokec2 ></i>\cf0 \strokec4  \cf2 \strokec2 <?php\cf0 \strokec4  esc_html_e(\cf6 \strokec6 'Renew'\cf0 \strokec4 , \cf6 \strokec6 'listeo_core'\cf0 \strokec4 ); \cf2 \strokec2 ?></a>\cf0 \cb1 \strokec4 \
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \cf5 \strokec5 endif\cf0 \strokec4 ; \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\
\cb3         \cf2 \strokec2 <?php\cf0 \strokec4  \cf8 \strokec8 // MRJ - show call button\cf0 \cb1 \strokec4 \
\cb3         $wa_number = get_post_meta($data->listing_id, \cf6 \strokec6 '_whatsapp'\cf0 \strokec4 , \cf5 \strokec5 true\cf0 \strokec4 );\cb1 \
\cb3         \cf5 \strokec5 if\cf0 \strokec4  ($wa_number)\{\cb1 \
\cb3             $wa_link = \cf6 \strokec6 'https://wa.me/'\cf0 \strokec4  . $wa_number;\cb1 \
\cb3             \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3             \cf2 \strokec2 <a\cf0 \strokec4  \cf9 \strokec9 href\cf0 \strokec4 =\cf5 \strokec5 "\cf2 \strokec2 <?php\cf0 \strokec4  echo $wa_link; \cf2 \strokec2 ?>\cf5 \strokec5 "\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "button gray"\cf2 \strokec2 ><i\cf0 \strokec4  \cf9 \strokec9 class\cf0 \strokec4 =\cf5 \strokec5 "sl sl-icon-speech"\cf2 \strokec2 ></i>\cf0 \strokec4  Chat on Whatsapp\cf2 \strokec2 </a>\cf0 \cb1 \strokec4 \
\cb3             \cf2 \strokec2 <?php\cf0 \cb1 \strokec4 \
\cb3         \}\cb1 \
\cb3         \cf2 \strokec2 ?>\cf0 \cb1 \strokec4 \
\cb3     \cf2 \strokec2 </div>\cf0 \cb1 \strokec4 \
\pard\pardeftab720\partightenfactor0
\cf2 \cb3 \strokec2 </li>\cf0 \cb1 \strokec4 \
}