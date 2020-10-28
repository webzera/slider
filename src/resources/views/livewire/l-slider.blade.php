<div>
@include('admin::livewire.create')
<section>
<div class="container">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Slider List
                    <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target="#addSliderModal">
                    Add Slider
                    </button>
                </h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Caption</th>
                            <th>Sub caption</th>
                            <th>Link Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{$slider->image}}</td>
                            <td>{{$slider->slider_name}}</td>
                            <td>{{$slider->caption}}</td>
                            <td>{{$slider->sub_caption}}</td>
                            <td>{{$slider->link_url}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
</section>
</div>