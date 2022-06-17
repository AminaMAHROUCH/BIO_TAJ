<form action="{{url('updateVisite')}}" methode="POST">
    @methode('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <label for="">الوزن</label>
            <input class="form-control" value="{{$visite->poid}}" type="number" name="poid">
        </div>
        <div class="col-lg-6">
        <label for="">الضغط</label>
            <input class="form-control" value="{{$visite->tension}}" type="number" name="tension">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <label for="">نبض القلب</label>
            <input class="form-control" value="{{$visite->battement_coeur}}" type="number" name="battement_coeur">
        </div>
        <div class="col-lg-6">
        <label for="">مستوى السكري</label>
            <input class="form-control" value="{{$visite->niveau_diabete}}" type="number" name="niveau_diabete">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <label for="">الأدوية المستعملة</label>
            <input class="form-control" value="{{$visite->medicaments_utilises}}" type="text" name="medicaments_utilises">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <label for="">المرض الحالي</label>
            <input class="form-control" value="{{$visite->maladies_actuelles}}" type="text" name="maladies_actuelles">
        </div>
        <div class="col-lg-6">
        <label for="">علاج</label>
            <input class="form-control" value="{{$visite->remede}}" type="text" name="remede">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <label for="">الأعراض</label>
        <textarea name="sympthomes" class="form-control"  cols="30" rows="5">{{$visite->sympthomes}}</textarea>
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-success">تعديل</button>
    </div>
</form>