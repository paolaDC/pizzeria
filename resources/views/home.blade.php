@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <h3 class="h3 mb-2 text-gray-800 float-left">
                <?=trans('app.catalogo')?>
            </h3>
            <div class="col-md-12">
                <a class="btn btn-primary float-right" href="{{ url('../pizza/nueva') }}">Nueva</a>
            </div>
            <div class="table">
                <table id="pizzas" class="display" width="100%">
                    <thead>
                    <tr>
                        <th hidden><?=trans('app.id')?></th>
                        <th><?=trans('app.nombre')?></th>
                        <th><?=trans('app.precio')?></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($catalogo as $pizza)
                        <tr>
                            <td hidden>{!! $pizza->id !!}</td>
                            <td>{!! $pizza->nombre !!}</td>
                            <td>{!! $pizza->total !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>

        $('#pizzas').DataTable({
            "paginationType": "full_numbers",
            "language": {
                "emptyTable": "<?=trans('datatables.emptyTable')?>",
                "info": "<?=trans('datatables.info')?>",
                "infoEmpty": "<?=trans('datatables.infoEmpty')?>",
                "infoFiltered": "<?=trans('datatables.infoFiltered')?>",
                "lengthMenu": "<?=trans('datatables.lengthMenu')?>",
                "loadingRecords": "<?=trans('datatables.loadingRecords')?>",
                "processing": "<?=trans('datatables.processing')?>",
                "search": "<?=trans('datatables.search')?>",
                "zeroRecords": "<?=trans('datatables.zeroRecords')?>",
                "paginate": {
                    "first": "<?=trans('datatables.first')?>",
                    "last": "<?=trans('datatables.last')?>",
                    "next": "<?=trans('datatables.next')?>",
                    "previous": "<?=trans('datatables.previous')?>"
                },
                "aria": {
                    "sortAscending": "<?=trans('datatables.sortAscending')?>",
                    "sortDescending": "<?=trans('datatables.sortDescending')?>"
                }
            }
        });



    </script>
@endsection

