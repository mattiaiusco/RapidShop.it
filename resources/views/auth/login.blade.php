<x-layout>
<div class="d-flex align-items-center container2-register">
    <div class="container-register mx-auto">
        <div class="heading">Login</div>
        <form action="{{ route('login') }}" class="form" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <input  class="input" type="email" name="email" id="email"
                        placeholder="E-mail">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6">
                    <input  class="input" type="password" name="password" id="password"
                        placeholder="Password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input class="login-button" type="submit" value="Login">
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-12">
                    {{__('ui.dontHaveAccount')}} <a href="{{route('register')}}" class="tx-primary">{{__('ui.register')}}</a>
                </div>
            </div>
        </form>
    </div>
</div>

</x-layout>
