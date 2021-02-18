@extends('layouts.app_inner_page')

@section('content')
<br><br><br><br><br>

<div class="container">
   <div class="row">
      <div class="col-md-12 col-sm-12 ">
         <h4>{!! $page_content->title !!}</h4>
         <br/>
         <p>{!! $page_content->content !!}</p>
      </div>
   </div>
</div>

<br><br><br><br>
@endsection

@section('scripts')
<script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */

    function signin() {
      document.getElementById("loginDropdown").classList.toggle("show");
    }    

    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
</script>
@endsection