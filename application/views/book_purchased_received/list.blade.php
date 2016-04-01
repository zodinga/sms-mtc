@layout('dashboard')
@section('content')
<div class="row">
	@if($conf == 1)
        <div class="alert alert-success" role="alert">Book successfully deleted...</div>
    @endif
    @if($conf == 2)
        <div class="alert alert-danger" role="alert">Delete Error: Book Cannot Delete...</div>
    @endif
    @if($conf == 3)
        <div class="alert alert-warning" role="alert">Save Error: Book Cannot Save...</div>
    @endif
    @if($conf == 4)
        <div class="alert alert-success" role="alert">One Book successfully Added...</div>
    @endif
    @if($conf == 5)
        <div class="alert alert-success" role="alert">One Book successfully Updated...</div>
    @endif

    <div class="col-md-12">
        <h3>Existing Books : Total {{BookPurchasedReceiveds::count()}}</h3>
        <hr>
        <form class="form-inline" method="POST" action="/book_purchased_received/search">
            <div class="input-group">
                <input type="text" class="form-control" name="title" placeholder="Enter Title">
            </div>
            or
            <div class="input-group">
                <input type="text"  class="form-control" name="author_editors" placeholder="Enter Author/Editor">
            </div>
            or  
            <div class="input-group">
                <input type="date" class="form-control" id="date_of_purchase" name="date_of_purchase" placeholder="Enter Date of Purchase">
            </div>
            or  
            <div class="input-group">
                <input type="text" class="form-control" name="source" placeholder="Enter Source">
            </div>
                       
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
            </div>
        </form>
        <hr>
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<td><strong>#</strong></td>
        			<td><strong>Title</strong></td>
        			<td><strong>Author/Editor</strong></td>
                    <td><strong>Quantity</strong></td>
                    <td><strong>Price</strong></td>
                    <td><strong>Purchasing Price</strong></td>
        			<td><strong>Purchase Date</strong></td>
        			<td><strong>Source</strong></td>
        			<td><strong>Remarks</strong></td>
        		</tr>
        	</thead>
        	<tbody>
        		@foreach($books as $book)
        		<tr>
        			<td>{{$book->id}}</td>
        			<td>{{$book->title}}</td>
        			<td>{{$book->author_editiors ? $book->author_editiors : '-'}}</td>
                    <td>{{$book->quantity ? $book->quantity : '-'}}</td>
                    <td>{{$book->price ? $book->price : '-'}}</td>
        			<td>{{$book->purchasing_price ? $book->purchasing_price : '-'}}</td>
                    <?php $dop=date_create($book->date_of_purchase); ?>
                    <td>{{date_format($dop,"d/m/Y")}}</td>
        			<td>{{$book->source ? $book->source : '-'}}</td>
        			<td>{{$book->remarks ? $book->remarks : '-'}}</td>
        		</tr>
        		@endforeach
        	</tbody>
		</table>

		
    </div>

	
</div>
@endsection