---
title: Introduction
---

## Introduction[](#introduction)

`anomaly.plugin.contact`

The contact plugin provides a simple API for displaying contact forms.

###### Properties

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Required</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

collection

</td>

<td>

true

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The collection to add the asset to.

</td>

</tr>

</tbody>

</table>


### Configuration[](#introduction/configuration)

This plugin provides the `contact` form to be accessed using the `form` plugin function:

    {{ form('contact') }}

You can configure the `ContactFormBuilder` just the same as any other builder using the `form` function. For this plugin we will focus on `fields`, `actions`, and `options`.


#### Fields[](#introduction/configuration/fields)

You can define fields by using the `fields` method:

    {{ form('contact')
    .fields({
        'name': {
            'label': 'Name',
            'required': true,
            'type': 'anomaly.field_type.text'
        }
    })|raw }}

Naturally you would want to display more fields like subject, email, name, and maybe a field for comments. The `ContactFormBuilder` defines the following fields by default:

    protected $fields = [
        'name'    => [
            'label'    => 'Name',
            'type'     => 'anomaly.field_type.text',
            'required' => true,
        ],
        'email'   => [
            'label'    => 'Email',
            'type'     => 'anomaly.field_type.email',
            'required' => true,
        ],
        'subject' => [
            'label'    => 'Subject',
            'type'     => 'anomaly.field_type.select',
            'required' => true,
            'config'   => [
                'options' => [
                    'Support',
                    'Sales',
                    'Feedback',
                    'Other',
                ],
            ],
        ],
        'message' => [
            'label'    => 'Message',
            'type'     => 'anomaly.field_type.textarea',
            'required' => true,
        ],
    ];


#### Actions[](#introduction/configuration/actions)

You can define actions by using the `actions` method:

    {{ form('contact')
    .actions({
        'submit': {
            'text': 'Say Hello!',
        }
    })|raw }}

The `ContactFormBuilder` defines the following actions by default:

    protected $actions = [
        'submit' => [
            'redirect' => false,
        ],
    ];


#### Options[](#introduction/configuration/options)

Options control details of the notification message. You can set them with a fluent API:

    {{ form('contact')
    .to(['example@domain.com', 'example2@domain.com'])
    .from('{email}')
    .subject('You have received a message from {name}')|raw }}

<div class="alert alert-primary">**Pro Tip:** All options are parsed with the input data.</div>

###### Options

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>Key</th>

<th>Type</th>

<th>Default</th>

<th>Description</th>

</tr>

</thead>

<tbody>

<tr>

<td>

subject

</td>

<td>

string

</td>

<td>

Contact Request

</td>

<td>

The subject of the notification email.

</td>

</tr>

<tr>

<td>

to

</td>

<td>

string|array

</td>

<td>

The administrators email.

</td>

<td>

The email(s) to send the notification to.

</td>

</tr>

<tr>

<td>

from

</td>

<td>

string

</td>

<td>

The system email or noreply@localhost.com if not set.

</td>

<td>

The email(s) to send the notification to.

</td>

</tr>

<tr>

<td>

cc

</td>

<td>

string|array

</td>

<td>

none

</td>

<td>

The email(s) to CC the notification to.

</td>

</tr>

<tr>

<td>

bcc

</td>

<td>

string|array

</td>

<td>

none

</td>

<td>

The email(s) to BCC the notification to.

</td>

</tr>

<tr>

<td>

redirect

</td>

<td>

string

</td>

<td>

none

</td>

<td>

The URL or path to redirect to after sending.

</td>

</tr>

<tr>

<td>

success_message

</td>

<td>

string

</td>

<td>

Your message has been sent! Thank you.

</td>

<td>

The message to display after successfully sending.

</td>

</tr>

<tr>

<td>

error_message

</td>

<td>

string

</td>

<td>

There was a problem sending your message.

</td>

<td>

The message to display after failure to send.

</td>

</tr>

<tr>

<td>

message_view

</td>

<td>

string

</td>

<td>

anomaly.plugin.contact::email/contact

</td>

<td>

The view to use for the notification message.

</td>

</tr>

</tbody>

</table>
