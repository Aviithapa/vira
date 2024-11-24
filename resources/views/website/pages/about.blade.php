
@extends('website.layout.app')

@section('content')
<section>
  <div class="npc_page_wrapper">
    <div class="npc_page">
      <!-- sidebar section -->
    

      <!-- content area section -->
      <div class="npc_content_area_wrapper" style="width: 70%; margin: auto;">
        <div class="npc_content">
          <div id="npc_about" class="npc_content_wrapper active">
            <div class="npc_about_content" style="margin: 20px;">
              <h2 style="font-size: 32px; font-weight: 600; margin-bottom: 20px;">Introduction</h2>
               {!! $about->content !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


  
    


@endsection