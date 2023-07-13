<x-app-layouts title="Dashboard Profile" page="Profile">
    <div class="row pb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                   
                    
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs mb-4 d-flex justify-content-center" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#gantiPassword">Ganti Password</a>
                            </li>
                          
                        </ul>
                        <div class="tab-content tab-content-default">
                            <div class="tab-pane fade show active" id="profile">
                                <div class="card">
                                    <div class="card-header"></div>                  
                                    <div class="card-body">                    
                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" value="{{ $user->email }}" readonly>
                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="username" type="text" class="form-control" value="{{ $user->name }}" readonly>
                    
                                                
                                                </div>
                                            </div>
                    
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>


                        {{-- Tab Ganti Password --}}
                            <div class="tab-pane fade" id="gantiPassword">
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <form action="{{ route('password.change', $user->id) }}" method="post">
                                            @method('put')                                            
                                            @csrf
                    
                                            {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}
                    
                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email ?? old('email') }}" required autocomplete="email" autofocus>
                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                </div>
                                            </div>
                    
                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Ganti Password
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layouts>