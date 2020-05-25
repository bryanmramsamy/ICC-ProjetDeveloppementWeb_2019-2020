<?php
# Administration management signals
require('views/signals/signal_post_user_activationStateSwitch.php');

# Article management signals
require('views/signals/signal_post_articleChangeAvailability.php');
require('views/signals/signal_post_articleCreation.php');
require('views/signals/signal_post_articleUpdate.php');

# Order management signals
require('views/signals/signal_post_add_to_basket.php');
require('views/signals/signal_post_order_cancel.php');
require('views/signals/signal_post_payment.php');
require('views/signals/signal_post_remove_from_basket.php');

# Post's comments management signals
require('views/signals/signal_post_commentCreation.php');
require('views/signals/signal_post_commentUpdate.php');
require('views/signals/signal_post_commentVisibility.php');

# MiniChat messages management signals
require('views/signals/signal_post_messageCreation.php');
require('views/signals/signal_post_messageUpdate.php');
require('views/signals/signal_post_messageVisibility.php');

# Password change signals
require('views/signals/signal_post_password_change.php');

# Posts management signals
require('views/signals/signal_post_postCreation.php');
require('views/signals/signal_post_postPublication.php');
require('views/signals/signal_post_postUpdate.php');

# Profile management signals
require('views/signals/signal_post_profileUpdate.php');

# Authentication signals
require('views/signals/signal_post_userRegister.php');
require('views/signals/signal_post_userSignin.php');
