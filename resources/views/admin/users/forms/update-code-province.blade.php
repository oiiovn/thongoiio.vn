
            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tỉnh') }}</label>
                    <x-select name="province_id" :required="true">
                        @if(auth()->user()->hasProvince())
                            <x-option value="{{$user->province_id}}" :title="__($user->province->name)" />
                        @else
                            <x-option value="" :title="__('Chọn tỉnh thành')" />
                        @endif

                        @foreach($province as $value)
                            <x-option value="{{ $value->id }}" :title="__($value->name)" />
                        @endforeach
                    </x-select>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Quận/huyện') }}</label>
                    <x-select name="district_id" :required="true">
                        @if(auth()->user()->hasDistrict())
                            <x-option value="{{$user->district_id}}" :title="__($user->district->name)" />
                        @else
                            <x-option value="" :title="__('Chọn quận huyện')" />
                        @endif
                    </x-select>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Xã') }}</label>
                    <x-select name="ward_id" :required="true">
                        @if(auth()->user()->hasWard())
                            <x-option value="{{$user->ward_id}}" :title="__($user->ward->name)" />
                        @else
                            <x-option value="" :title="__('Chọn xã phường')" />
                        @endif
                    </x-select>
                </div>
            </div> 


            <!-- vip -->
            <!-- <div class="col-md-6 col-sm-12">
           
            <!-- <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tỉnh') }}</label>
                    <x-select name="province_id" :required="true">
                        @if(auth()->user()->hasProvince())
                            <x-option value="{{$user->province_id}}" :title="__($user->province->name)" />
                        @else
                            <x-option value="" :title="__('Chọn tỉnh thành')" />
                        @endif

                        @foreach($province as $value)
                            <x-option value="{{ $value->id }}" :title="__($value->name)" />
                        @endforeach
                    </x-select>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Quận/huyện') }}</label>
                    <x-select name="district_id" :required="true">
                        @if(auth()->user()->hasDistrict())
                            <x-option value="{{$user->district_id}}" :title="__($user->district->name)" />
                        @else
                            <x-option value="" :title="__('Chọn quận huyện')" />
                        @endif
                    </x-select>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Xã') }}</label>
                    <x-select name="ward_id" :required="true">
                        @if(auth()->user()->hasWard())
                            <x-option value="{{$user->ward_id}}" :title="__($user->ward->name)" />
                        @else
                            <x-option value="" :title="__('Chọn xã phường')" />
                        @endif
                    </x-select>
                </div>
            </div> -->
            <!-- vip -->
            <!-- <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Vip') }}:</label>
                    <x-select name="vip" :required="true">
                        <x-option value="" :title="__('Chọn Vip')" />
                        @foreach ($vip as $key => $value)
                            <x-option :option="$user->vip" :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
            </div> -->
            <!-- <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Tỉnh') }}</label>
                    <x-select name="province_id" :required="true">
                        @if(auth()->user()->hasProvince())
                            <x-option value="{{$user->province_id}}" :title="__($user->province->name)" />
                        @else
                            <x-option value="" :title="__('Chọn tỉnh thành')" />
                        @endif

                        @foreach($province as $value)
                            <x-option value="{{ $value->id }}" :title="__($value->name)" />
                        @endforeach
                    </x-select>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Quận/huyện') }}</label>
                    <x-select name="district_id" :required="true">
                        @if(auth()->user()->hasDistrict())
                            <x-option value="{{$user->district_id}}" :title="__($user->district->name)" />
                        @else
                            <x-option value="" :title="__('Chọn quận huyện')" />
                        @endif
                    </x-select>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Xã') }}</label>
                    <x-select name="ward_id" :required="true">
                        @if(auth()->user()->hasWard())
                            <x-option value="{{$user->ward_id}}" :title="__($user->ward->name)" />
                        @else
                            <x-option value="" :title="__('Chọn xã phường')" />
                        @endif
                    </x-select>
                </div>
            </div> -->
            <!-- vip -->
            <!-- <div class="col-md-6 col-sm-12">
                <div class="mb-3">
                    <label class="control-label">{{ __('Vip') }}:</label>
                    <x-select name="vip" :required="true">
                        <x-option value="" :title="__('Chọn Vip')" />
                        @foreach ($vip as $key => $value)
                            <x-option :option="$user->vip" :value="$key" :title="__($value)" />
                        @endforeach
                    </x-select>
                </div>
            </div> -->