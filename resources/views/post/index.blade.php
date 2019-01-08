@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-heading">Posts</div>


                <div class="panel-body">


                    <table class="table table-bordered">

                        <tr>

                            <th>Id</th>

                            <th>Name</th>

                            <th>Kekurangan</th>

                            
                            <th>Kelebihan</th>

                            <th>Star</th>

                            <th>Rate</th>

                        </tr>

                        @if($posts->count())

                            @foreach($posts as $post)
                           

                            <tr>

                                <td>{{ $post->id }}</td>

                                <td>{{ $post->nama }}</td>

                                <td>{{ $post->kekurangan }}</td>
                                <td>{{ $post->kelebihan }}</td>
                                

                                <td>

                                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $post->averageRating }}" data-size="xs" disabled="">

                                </td>

                                <td>

                                <form action="{{ route('post.store') }}" method="POST">

                                    @csrf

                                    <div class="rating">

                                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $post->userAverageRating }}" data-size="xs">

                                        <input type="hidden" name="id" required="" value="{{ $post->id }}">

                                        <span class="review-no"> {{DB::table('ratings')->where('rateable_id', $post->id)->count()}} reviews</span>

                                        <br/>

                                        <button class="btn btn-success">Submit Review</button>

                                    </div>


                                    </form>

                                </td>

                            </tr>

                            @endforeach

                        @endif

                    </table>


                </div>

            </div>

        </div>

    </div>

</div>


<script type="text/javascript">

    $("#input-id").rating();

</script>

@endsection