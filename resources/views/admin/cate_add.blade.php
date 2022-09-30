@extends('admin.adminlayout')
@section('admin_content')
    <div class="form-w3layouts">
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add new category
                        </header>
                        <?php
		                    $msg = Session::get('message');
		                    if($msg){
                                echo "<script type='text/javascript'>alert('$msg');</script>";
			                    Session::put('message', null);
		                    }
	                    ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{('save_category')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="cate">Categoty Name</label>
                                    <input type="text" class="form-control" id="catename" name="catename" placeholder="Enter category name">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Description</label>
                                    <textarea class="form-control" style="resize: none" rows="6" id="desc" name="desc" placeholder="Description new category"></textarea>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                                </form>
                            </div>
                        </div>
                    </section>

            </div>   
        </div>
    </div>
@endsection