
@if(session()->has(config()->get('bs4-alert.session_name')))
  @foreach(session()->get(config()->get('bs4-alert.session_name')) as $bs4Alert)
    <div class="alert {{ $bs4Alert['type'] }} alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      @if($bs4Alert['title'])
        <h4 class="alert-heading">{!! $bs4Alert['title'] !!}</h4>
      @endif
      @foreach($bs4Alert['messages'] as $bs4AlertMessage)
        <p class="mb-0">{!! $bs4AlertMessage !!}</p>
      @endforeach
    </div>
  @endforeach
@endif
