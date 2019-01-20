<!-- Sidebar Widgets Column -->
<div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">جست و جو</h5>
        <div class="card-body">
            <form action="/search" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" required autocomplete="off" placeholder="جست و جو ...">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">
                            <i class="fas fa-search" style="line-height: 2em;"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>


    <!-- new post list -->
    <div class="card my-4">
        <h5 class="card-header">نوشته های تازه</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                        <ul class="list-unstyled mb-0">
                            @foreach($articles as $article)
                            <li>
                                <h6><a class="a-link" href="{{$article->path() }}" >{{ $article->title }}</a></h6>
                            </li>
                            @endforeach
                        </ul>

                </div>

            </div>
        </div>
    </div>

    <!-- months list-->
    <div class="card my-4">
        <h5 class="card-header">آرشیو ماهانه</h5>
        <div class="card-body">
            <ol class="list-unstyled">
                @foreach($archives as $stats)
                    <li>
                        <a class="a-link" href="/?month={{$stats['month']}}&year={{$stats['year']}}">
                            {{ jdate($stats['month'] .''. $stats['year'])->format('%B %Y')}}
                        </a>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>

</div>
