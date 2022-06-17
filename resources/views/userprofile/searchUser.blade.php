@extends('layout.master')
@section('content')

<div class="search-box mt-4">
    <input onkeyup="searchUser()" type="text" id="searchUserName" name="search_user" class="search-input" placeholder="Search Your Friends">

    <button  class="search-button">
      <i class="fas fa-search"></i>
    </button>
 </div>


 <div id="search"></div>

@include('userprofile.searchAllUser')



@endsection



