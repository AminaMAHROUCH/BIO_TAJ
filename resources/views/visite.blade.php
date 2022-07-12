<form methode="POST" action="{{route('addvisite')}}" >
           <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="row">
        <div class="col-lg-6">
            <label for="">الوزن</label>
            <input class="form-control" type="number" name="poid">
        </div>
        <div class="col-lg-6">
        <label for="">الضغط</label>
            <input class="form-control" type="number" name="tension">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <label for="">نبض القلب</label>
            <input class="form-control" type="number" name="battement_coeur">
        </div>
        <div class="col-lg-6">
        <label for="">مستوى السكري</label>
            <input class="form-control" type="number" name="niveau_diabete">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <label for="">الأدوية المستعملة</label>
            <input class="form-control" type="text" name="medicaments_utilises">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
        <label for="">المرض الحالي</label>
            <input class="form-control" type="text" name="maladies_actuelles">
        </div>
        <div class="col-lg-6">
        <label for="">علاج</label>
            <input class="form-control" type="text" name="remede">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <label for="">الأعراض</label>

        <textarea name="sympthomes" class="form-control" cols="30" rows="5"></textarea>
        </div>
    </div>
    <div>
        <button class="btn btn-success" type="submit">
            Add
        </button>
    </div>
</form>