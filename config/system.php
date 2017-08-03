<?php

return [

    /*
     * Contacts table used to store contacts
     */
	'contacts_table' => 'contacts',

    /*
     * Contact model used by System to create correct relations.
     * Update the contact if it is in a different namespace.
    */
	'contact' => \SKT\Models\System\Contact\Contact::class,

    /*
     * Contacts table used to store contacts
     */
    'contacts_answers_table' => 'contacts_answers',

    /*
     * ContactAnswer model used by System to create correct relations.
     * Update the contact_answer if it is in a different namespace.
    */
    'contact_answer' => \SKT\Models\System\Contact\ContactAnswer::class,

    /*
     * Newsletters table used to store newsletters
     */
    'newsletters_table' => 'newsletters',

    /*
     * Newsletter model used by System to create correct relations.
     * Update the newsletters if it is in a different namespace.
    */
    'newsletter' => \SKT\Models\System\Newsletter\Newsletter::class,

    /*
     * Galleries table used to store galleries
     */
    'galleries_table' => 'galleries',

    /*
     * Gallery model used by System to create correct relations.
     * Update the galleries if it is in a different namespace.
    */
    'gallery' => \SKT\Models\System\Gallery\Gallery::class,

];