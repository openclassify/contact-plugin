---
title: Usage
---

## Usage[](#usage)

To begin using the plugin simple use the `form` function.


### Examples[](#usage/examples)

Below are a few examples of putting the above configuration into use for real world examples.


#### Default Fields with Specific Recipient[](#usage/examples/default-fields-with-specific-recipient)

    <p>Contact Us!</p>

    {{ form('contact')
    .to('example@domain.com')
    .from('{email}')|raw }}


#### Minimalistic Form with Custom Layout[](#usage/examples/minimalistic-form-with-custom-layout)

    {%  set form = form('contact')
    .fields({
        'email': {
            'placeholder': 'What is your email?',
            'type': 'anomaly.field_type.email',
            'required': true
        },
        'comment': {
            'placeholder': 'What would you like to talk about?',
            'type': 'anomaly.field_type.textarea',
            'required': true
        }
    })
    .to('example@domain.com')
    .from('{email}').get %}

    {{ form.open|raw }}

    <div class="form-group">
        {{ form.fields.email.input|raw }}
    </div>
    <div class="form-group">
        {{ form.fields.comment.input|raw }}
    </div>

    {{ form.actions|raw }}

    {{ form.close|raw }}


#### Default Fields with Redirect to Thank You Page[](#usage/examples/default-fields-with-redirect-to-thank-you-page)

    {{ form('contact')
    .redirect('thank-you')
    .to('example@domain.com')
    .from('{email}')|raw }}
