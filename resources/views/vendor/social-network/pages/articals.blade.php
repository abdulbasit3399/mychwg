<div class="row ">

    <div class="col-lg-12 col-12">        

        @include('vendor.social-network.components.social_network_navbar')

        <div class="row">



            <div class="col-lg-8">

                <div class="row saved__posts">

                    @foreach(Auth::user()->folders as $item)

                        <div class="col-lg-4">

                            <div class="card text-center">

                                    <a class="btnGetSavedPosts" data-url="{{ route('social.category.posts', Crypt::encrypt($item->id)) }}">{{ $item->title }}</a>

                                </div>

                        </div>

                    @endforeach

                </div>

            </div>

            <div class="col-lg-4">

                <div class="card">

                    <div class="card-body">

                        <h2 class="text-success">Create new Category </h2>

                        <form action="{{ route('social.create.category.folder') }}" method="post">

                            @csrf

                            <label>Category Title</label>

                            <input type="title" name="title" class="form-control" required>



                            <button type="submit" class="btn btn-block btn-success mt-2 mb-1"><i class="fas fa-plus-circle"></i> Create Folder</button>

                        </form>

                        <small>NOTE: <em>The folder you create can be used to save posts across Materia.</em></small>

                    </div>

                </div>

            </div>



            



        </div>

    </div>

</div>

