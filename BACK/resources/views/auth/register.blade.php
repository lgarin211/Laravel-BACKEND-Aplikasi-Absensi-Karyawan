<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="nip" value="{{ __('NIP atau NIK') }}" />
                <x-jet-input id="nip" class="block mt-1 w-full" type="text" name="nip" :value="old('nip')" required />
            </div>


            <div class="mt-4">
                <x-jet-label for="Jabatan" value="{{ __('Jabatan') }}" />
                <!-- <x-jet-input id="Jabatan" class="block mt-1 w-full" type="text" name="Jabatan" :value="old('Jabatan')" required autofocus autocomplete="Jabatan" /> -->
                <select name="Jabatan" id="Jabatan" class="block mt-1 w-full form-select" aria-label="Default select example">
                    <option value="Karyawan">Karyawan</option>
                    <option value="Bos">Bos</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="jenis_kelamin" value="{{ __('Jenis Kelamin') }}" />
                <!-- <x-jet-input id="jenis_kelamin" class="block mt-1 w-full" type="text" name="jenis_kelamin" :value="old('jenis_kelamin')" required autofocus autocomplete="jenis_kelamin" /> -->
                <select name="jenis_kelamin" id="jenis_kelamin" class="block mt-1 w-full form-select" aria-label="Default select example">
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mt-4">
                <x-jet-label for="tempat_l" value="{{ __('Tempat Lahir') }}" />
                <x-jet-input id="tempat_l" class="block mt-1 w-full" type="text" name="tempat_l" :value="old('tempat_l')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="tgl_l" value="{{ __('Tanggal Lahir') }}" />
                <x-jet-input id="tgl_l" class="block mt-1 w-full" type="date" name="tgl_l" :value="old('tgl_l')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="notel" value="{{ __('Nomor Whatapps atau Telpon yang dapat di hubungi') }}" />
                <x-jet-input id="notel" class="block mt-1 w-full" type="number" name="notel" :value="old('notel')" required value="62"/>
            </div>

            <div class="mt-4">
                <x-jet-input id="jumlah_jam_kerja" class="block mt-1 w-full" type="hidden" name="jumlah_jam_kerja" :value="old('jumlah_jam_kerja')" required value="0"/>
            </div>
            <div class="mt-4">
                <x-jet-input id="profile_photo_path" class="block mt-1 w-full" type="hidden" name="profile_photo_path" :value="old('jumlah_jam_kerja')" required value="{{url('/')}}/SoftLand/assets/img/undraw_svg_2.svg"/>
            </div>

            <hr class="mt-5">

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Ulangi Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
