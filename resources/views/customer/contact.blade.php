@extends('customer.layout')

@section('title', 'Contact Us')

@section('main')
    <h2>Contact us</h2>
    <form class="grid-x grid-padding-x" data-abide novalidate>
        <div class="cell large-10 large-offset-1">
            <div data-abide-error class="alert callout" style="display: none;">
                <p><i class="fi-alert"></i>Please fix the errors below before continuing:</p>
            </div>
        </div>

        <div class="cell small-12 medium-6 large-5 large-offset-1">
            <label>Your name
                <input type="text" id="enquiry-name" required>
                <span class="form-error">Required field</span>
            </label>
        </div>

        <div class="cell small-12 medium-6 large-5">
            <label>Your email address
                <input type="email" id="enquiry-email" placeholder="you@example.com" required pattern="email">
                <span class="form-error">Please enter a valid email address</span>
            </label>
        </div>

        <div class="cell small-12 medium-6 large-5 large-offset-1">
            <label>Type of enquiry
                <select id="enquiry-type" required aria-describedby="enquiryTypeHelpText">
                    <option class="option-invalid" value="" label=" "></option>
                    <option value="quote">Request a quote</option>
                    <option value="advice">Gardening advice</option>
                    <option value="feedback">Complaint or other feedback</option>
                    <option value="other">Other enquiry</option>
                </select>
                <span class="form-error">Required</span>
            </label>
            <p class="help-text" id="enquiryTypeHelpText">Please select one</p>
        </div>

        <div class="cell small-12 medium-6 large-5">
            <label>What products are related to your enquiry?
                <textarea id="enquiry-products" required aria-describedby="productsHelpText" rows="2"></textarea>
                <span class="form-error">Required</span>
            </label>
            <p class="help-text" id="productsHelpText">Enter one product name per line</p>
        </div>

        <div class="cell small-12 large-10 large-offset-1">
            <label>Enter your message here:
                <textarea id="enquiry-message" required rows="3"></textarea>
                <span class="form-error">Required</span>
            </label>
        </div>

        <fieldset class="cell small-7 large-6 large-offset-1">
            <button class="expanded button primary" type="submit" value="Submit">Submit</button>
        </fieldset>

        <fieldset class="cell small-5 medium-4 large-3 medium-offset-1">
            <button class="expanded button secondary" type="reset" value="Reset">Reset</button>
        </fieldset>
    </form>
@endsection
