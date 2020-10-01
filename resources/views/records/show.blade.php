@extends('layouts.app')

@section('content')
<div class="card post-menu-card col-sm-3">
     <nav class="post-menu">
          <a class="text-muted" href="{{ route('posts.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034922/home_itbvjs.svg">HOME</a>
          <a class="text-muted" href="{{ route('posts.create') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601039532/document-add_t7ccey.svg">CREATE POST</a>
          <a class="text-muted" href="{{ route('users.show', Auth::user()->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034937/user_grc1yd.svg">PROFILE</a>
          <a class="text-muted" href="{{ route('records.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034931/calendar_cplkec.svg">CALENDAR</a>
          <a class="text-muted" href="{{ route('photos.index') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601034942/image_ckvyba.svg">GALLERY</a>
          <a class="text-muted" href="{{ url('contact') }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601038055/email_iny45a.svg">CONTACT US</a>
          <a class="text-muted" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601081054/log-out_gwkzdh.svg">LOG-OUT
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
               @csrf
          </form>
     </nav>
</div>
<div class="card col-sm-6 mx-auto my-5 profile-show">
     @if($record->user_id === Auth::id())
     <div class="dropdown dot-menu-record">
          <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img src="https://res.cloudinary.com/tatsu/image/upload/v1601111215/options-horizontal_i4cub7.svg">
          </div>
          <div class="dropdown-menu dropdown-menu-bg" aria-labelledby="dropdownMenuButton">
               <a class="dropdown-item dot-menu-item text-muted" href="{{ route('records.edit', $record->id) }}"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172995/edit_g4swwu.svg">EDIT</a>
               <a class="dropdown-item dot-menu-item text-muted" onclick="event.preventDefault();
                                                  document.getElementById('delete-post').submit();"><img src="https://res.cloudinary.com/tatsu/image/upload/v1601172993/delete_b1rjwi.svg">DELETE</a>
               <form id="delete-post" action="{{ route('records.destroy', $record->id) }}" method="POST" style="display:none;">
                    @method('DELETE')
                    @csrf
               </form>
          </div>
     </div>
     @endif
     <div class="card-body col-xs-6">
          <p class="record-date text-muted">{{ $record->created_at->format('Y/m/d') }}</p>
          <img src="{{ $record->image_path }}" alt="画像" class="record-image">
          <div class="record-data">
               <table class="table record-table">
                    <thead>
                         <tr>
                              <th class="text-center">項目</th>
                              <th class="text-center">記録</th>
                         </tr>
                    </thead>
                    <tbody>
                         <tr>
                              <td class="text-center text-muted">サイズ</td>
                              <td class="text-center text-muted">{{ $record->size }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">睡眠時間</td>
                              <td class="text-center text-muted">{{ $record->sleep_time }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">ケア用品１</td>
                              <td class="text-center text-muted">{{ $record->care_item1 }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">ケア用品２</td>
                              <td class="text-center text-muted">{{ $record->care_item2 }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">ケア用品３</td>
                              <td class="text-center text-muted">{{ $record->care_item3 }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">ケア用品４</td>
                              <td class="text-center text-muted">{{ $record->care_item4 }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">アルコール摂取量</td>
                              <td class="text-center text-muted">{{ $record->alcohol }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">ストレス</td>
                              <td class="text-center text-muted">{{ $record->stress }}</td>
                         </tr>
                         <tr>
                              <td class="text-center text-muted">備考</td>
                              <td class="text-center text-muted">{{ $record->remarks }}</td>
                         </tr>
                    </tbody>
               </table>
          </div>
     </div>
</div>
@endsection
