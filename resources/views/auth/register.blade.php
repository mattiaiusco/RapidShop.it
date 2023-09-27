<x-layout>
<div class="d-flex align-items-center container2-register">
    <div class="container-register m-auto">
        <div class="heading">{{__('ui.register')}} </div>
        <form action="{{ route('register') }}" class="form" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <input  class="input" type="text" name="name" id="email"
                        placeholder="{{__('ui.name')}}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <input  class="input" type="email" name="email" id="email"
                        placeholder="E-mail">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <input  class="input" type="password" name="password" id="password"
                        placeholder="Password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <input  class="input" type="password" name="password_confirmation" id="password"
                        placeholder="{{__('ui.confirmPassword')}}">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input class="login-button" type="submit" value="{{__('ui.register')}}">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12">
                    {{__('ui.doYouHaveAnAccount')}} <a href="{{route('login')}}" class="tx-primary">Login</a>
                </div>
            </div>
        </form>
    </div>
</div>

</x-layout>
