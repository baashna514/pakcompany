@if (session('attribute'))
@foreach(session('attribute') as $id => $attribute)
<div class="row">
    <div class="col-sm-10">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne_1">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="true" aria-controls="collapseOne_1">
                        {{ $attribute['name'] }}
                    </a>
                </h4>
            </div>
            <div id="collapseOne_1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_1">
                <div class="panel-body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            
                                <table class="table">
                                    <tr>
                                        <td>Add Values for the {{ $attribute['name'] }} Attribute</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            @php
                                                $values = \App\Value::where('attribute_id', $attribute['id'])->get();
                                            @endphp
                                            <select name="attribute_values[]" id="attribute-values_{{ $attribute['id'] }}" class="form-control show-tick select2" multiple="multiple">
                                                <option>Select Values</option>
                                                @if ($values)
                                                    @foreach($values as $value)
                                                        <option value="{{ $value->name }}" style="background:{{ $value->name }};">{{ $value->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                <input type="checkbox" id="for_variation_{{ $attribute['id'] }}" name="for_variation">
                                <label for="for_variation_{{ $attribute['id'] }}">Use for Variation</label><br>
                                <a href="" class="btn btn-success btn-save-attribute" data-id="{{ $attribute['id'] }}">Save Attribute</a>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-1">
        <a href="" class="btn btn-danger btn-remove-attribute" data-id="{{ $attribute['id'] }}">Delete</a>
    </div>
</div>
@endforeach
@endif