@extends('layouts/contentLayoutMaster')

@section('title', 'Sweet Alerts')

@section('vendor-style')
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
@endsection

@section('page-style')
<link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}">
@endsection


@section('content')
<!-- Basic example section -->
<section id="basic-examples">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Basic Examples</h4>
    </div>
    <div class="card-body">
      <p class="card-text mb-0">
        SweetAlert automatically centers itself on the page and looks great no matter if you're using a desktop
        computer, mobile or tablet. It's even highly customizable, as you can see below!
      </p>
      <div class="demo-inline-spacing">
        <button type="button" class="btn btn-outline-primary" id="basic-alert">Basic</button>
        <button type="button" class="btn btn-outline-primary" id="with-title">With Title</button>
        <button type="button" class="btn btn-outline-primary" id="footer-alert">With Footer</button>
        <button type="button" class="btn btn-outline-primary" id="html-alert">HTML</button>
      </div>
    </div>
  </div>
</section>
<!--/ Basic example section -->

<!-- Sweet alert Positions -->
<section id="sweet-alert-position">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Position</h4>
        </div>
        <div class="card-body">
          <p class="card-text mb-0">
            You can specify position of your alert with
            <code>{position : 'top-start' | 'top-end' | 'bottom-start' | 'bottom-end' }</code> in js.
          </p>
          <div class="demo-inline-spacing">
            <button class="btn btn-outline-primary" id="position-top-start">Top Start</button>
            <button class="btn btn-outline-primary" id="position-top-end">Top End</button>
            <button class="btn btn-outline-primary" id="position-bottom-start">Bottom Starts</button>
            <button class="btn btn-outline-primary" id="position-bottom-end">Bottom End</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Sweet alert Positions -->

<!-- SweetAlert Animations -->
<section id="sweet-alert-animations">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Animations</h4>
        </div>
        <div class="card-body">
          <p class="card-text mb-0">
            Use <code>popup</code> inside <code>showClass</code> parameter to add animation to your alert.
          </p>
          <div class="demo-inline-spacing">
            <button class="btn btn-outline-primary" id="bounce-in-animation">Bounce In</button>
            <button class="btn btn-outline-primary" id="fade-in-animation">Fade In</button>
            <button class="btn btn-outline-primary" id="flip-x-animation">Flip In</button>
            <button class="btn btn-outline-primary" id="tada-animation">Tada</button>
            <button class="btn btn-outline-primary" id="shake-animation">Shake</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ SweetAlert Animations -->

<!-- Types section -->
<section id="types">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Types</h4>
    </div>
    <div class="card-body">
      <p class="card-text mb-0">
        The type of the modal. SweetAlert comes with 4 built-in types which will show a corresponding icon animation:
        "success", "error", "warning" and "info". You can also set it as "input" to get a prompt modal. It can either be
        put in the object under the key "icon" or passed as the third parameter of the function.
      </p>
      <div class="demo-inline-spacing">
        <button type="button" class="btn btn-outline-success" id="type-success">Success</button>
        <button type="button" class="btn btn-outline-danger" id="type-error">Error</button>
        <button type="button" class="btn btn-outline-warning" id="type-warning">Warning</button>
        <button type="button" class="btn btn-outline-info" id="type-info">Info</button>
      </div>
    </div>
  </div>
</section>
<!--/ Types section -->

<!-- Options section -->
<section id="options">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Options</h4>
    </div>
    <div class="card-body">
      <div class="demo-inline-spacing">
        <button type="button" class="btn btn-outline-primary" id="custom-image">Custom Image</button>
        <button type="button" class="btn btn-outline-primary" id="auto-close">Auto Close</button>
        <button type="button" class="btn btn-outline-primary" id="outside-click">Click Outside</button>
        <button type="button" class="btn btn-outline-primary" id="prompt-function">Question</button>
        <button type="button" class="btn btn-outline-primary" id="ajax-request">Ajax</button>
      </div>
    </div>
  </div>
</section>
<!--/ Options section -->

<!-- Confirm option section -->
<section id="confirm-option">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Confirm Options</h4>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 col-sm-12 mb-2 mb-md-0">
          <h5 class="mb-1">Confirm Button Text</h5>
          <button type="button" class="btn btn-outline-primary" id="confirm-text">Confirm Text</button>
        </div>
        <div class="col-md-6 col-sm-12">
          <h5 class="mb-1">Confirm Button Color</h5>
          <button type="button" class="btn btn-outline-primary" id="confirm-color">Confirm Button Color</button>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Confirm option section -->
@endsection

@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>
@endsection
@section('page-script')
  <script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
@endsection
