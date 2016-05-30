<?php

# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('key-7e444488318cc781d3da8fdd7c047800');
$domain = "sandboxb8727b9d9c40413a910ea07baa27069b.mailgun.org";

# Make the call to the client.
$result = $mgClient->sendMessage("$domain",
                  array('from'    => 'Mailgun Sandbox <postmaster@sandboxb8727b9d9c40413a910ea07baa27069b.mailgun.org>',
                        'to'      => 'Artis <artisraudive3kurss@gmail.com>',
                        'subject' => 'Hello Artis',
                        'text'    => 'Congratulations Artis, you just sent an email with Mailgun!  You are truly awesome!  You can see a record of this email in your logs: https://mailgun.com/cp/log .  You can send up to 300 emails/day from this sandbox server.  Next, you should add your own domain so you can send 10,000 emails/month for free.'));


?>