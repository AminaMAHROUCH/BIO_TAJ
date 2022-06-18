<form action="{{url('updateVisite/'.$visite->id_visite)}}" methode="POST">
    {{method_field('put')}}
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <label for="">الوزن</label>
            <input class="form-control" value="{{$visite->poid}}" type="number" name="poid">
        </div>
        <div class="col-lg-4">
        <label for="">الضغط</label>
            <input class="form-control" value="{{$visite->tension}}" type="number" name="tension">
        </div>
        <div class="col-lg-4">
            <label for="">نبض القلب</label>
                <input class="form-control" value="{{$visite->battement_coeur}}" type="number" name="battement_coeur">
            </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <label for="">مستوى السكري</label>
                <input class="form-control" value="{{$visite->niveau_diabete}}" type="number" name="niveau_diabete">
            </div>
        <div class="col-lg-4">
        <label for="">الأدوية المستعملة</label>
            <input class="form-control" value="{{$visite->medicaments_utilises}}" type="text" name="medicaments_utilises">
        </div>
        <div class="col-lg-4">
            <label for="">المرض الحالي</label>
                <input class="form-control" value="{{$visite->maladies_actuelles}}" type="text" name="maladies_actuelles">
            </div>
    </div>
    <div class="row">
       
        <div class="col-lg-4">
        <label for="">علاج</label>
            <input class="form-control" value="{{$visite->remede}}" type="text" name="remede">
        </div>
        <div class="col-lg-4">
            <label for="">الأعراض</label>
            <textarea name="sympthomes" class="form-control"  cols="30" rows="5">{{$visite->sympthomes}}</textarea>
            </div>
    </div>
   
    <div>
        <button type="submit" class="btn btn-success">تعديل</button>
    </div>
</form>