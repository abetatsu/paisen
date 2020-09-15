@extends('layouts.app')

@section('content')
<form enctype="multipart/form-data" class="col-sm-6 mx-auto" method="POST" action="{{ route('users.update', $user->id) }}">
     @method('PUT')
     @csrf
     <div class="form-group">
          <label for="image">画像</label>
          <input type="file" class="form-control-file" id="image" name="image">
          <img src="{{ $user->image_path }}" alt="画像が設定されていません">
     </div>
     @foreach ($errors->all() as $error)
     <p class="text-center text-danger">{{ $error }}</p>
     @endforeach
     <div class="form-group">
          <label for="name">名前</label>
          <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
          <small id="emailHelp" class="form-text text-muted">名前の入力は必須です</small>
     </div>
     <div class="form-group">
          <label for="age">年齢</label>
          <select　class="form-control" name="age" 　id="age">
               @if(!empty($user->age))
               <option value="{{ $user->age }}" selected>{{ $user->age }}</option>
               @else
               <option value="">選択してください</option>
               @endif
               <option value="20歳未満">20歳未満</option>
               <option value="20-29歳">20-29歳</option>
               <option value="30-39歳">30-39歳</option>
               <option value="40-49歳">40-49歳</option>
               <option value="50-59歳">50-59歳</option>
               <option value="60-69歳">60-69歳</option>
               <option value="70-79歳">70-79歳</option>
               <option value="80歳以上">80歳以上</option>
          </select>
     </div>
     <div class="form-group">
          <label for="job">職業</label>
          <select class="form-control" id="job" name="job">
               @if(!empty($user->job))
               <option value="{{ $user->job }}" selected>{{ $user->job }}</option>
               @else
               <option value="">選択してください</option>
               @endif
               <option value="製造業">製造業</option>
               <option value="建築業">建築業</option>
               <option value="設備業">設備業</option>
               <option value="運輸業">運輸業</option>
               <option value="流通業">流通業</option>
               <option value="農林水産業">農林水産業</option>
               <option value="印刷・出版業">印刷・出版業</option>
               <option value="金融業・保険業">金融業・保険業</option>
               <option value="不動産業">不動産業</option>
               <option value="IT・情報通信業">IT・情報通信業</option>
               <option value="サービス業">サービス業</option>
               <option value="教育・研究機関">教育・研究機関</option>
               <option value="病院・医療機関">病院・医療機関</option>
               <option value="官公庁・自治体">官公庁・自治体</option>
               <option value="法人団体">法人団体</option>
               <option value="その他の業種">その他の業種</option>
          </select>
     </div>
     <button type="submit" class="btn btn-primary">更新する</button>
</form>
<a href="{{ route('users.show', $user->id) }}">戻る</a>
@endsection