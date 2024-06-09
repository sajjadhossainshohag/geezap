@extends('layouts.app')
@section('main-content')
        <section class="relative lg:mt-24 mt-[74px] pb-16">
            <div class="lg:container container-fluid">
                <div class="profile-banner relative text-transparent">
                    <input id="pro-banner" name="profile-banner" type="file" class="hidden" onchange="loadFile(event)" />
                    <div class="relative shrink-0">
                        <img src="{{asset('assets/images/hero/bg5.jpg')}}" class="h-64 w-full object-cover lg:rounded-xl shadow dark:shadow-gray-700" id="profile-banner" alt="">
                        <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label>
                    </div>
                </div>

                <div class="md:flex mx-4 -mt-12">
                    <div class="md:w-full">
                        <div class="relative flex items-end">
                            <div class="profile-pic text-center">
                                <input id="pro-img" name="profile-image" type="file" class="hidden" onchange="loadFile(event)" />
                                <div>
                                    <div class="relative size-28 max-w-[112px] max-h-[112px] mx-auto">
                                        <img src="{{asset('assets/images/team/01.jpg')}}" class="rounded-full shadow dark:shadow-gray-800 ring-4 ring-slate-50 dark:ring-slate-800" id="profile-image" alt="">
                                        <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-4">
                                <h5 class="text-lg font-semibold">{{auth()->user()->name}}</h5>
                                <p class="text-slate-400">{{auth()->user()->occupation}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end -->

            <div class="container mt-16">
                <div class="grid lg:grid-cols-12 grid-cols-1 gap-[30px]">
                    <div class="lg:col-span-12">
                        <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                            <h5 class="text-lg font-semibold mb-4">Personal Detail :</h5>
                            @session('status')
                            <p class="text-slate-400 mb-4">{{$value}}</p>
                            @endsession
                            <form action="{{route('personal-info.update')}}" method="POST">
                                @csrf
                                <div class="grid lg:grid-cols-12 md:grid-cols-2 grid-cols-1 gap-4">
                                    <div class="lg:col-span-12">
                                        <label class="form-label font-medium">Name : <span class="text-red-600">*</span></label>
                                        <input type="text"
                                               class="form-input border border-slate-100 dark:border-slate-800 mt-2"
                                               value="{{auth()->user()->name}}"
                                               id="firstname" name="name" required="">
                                    @error('name')
                                    <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                    </div>

                                    <div class="lg:col-span-6">
                                        <label class="form-label font-medium">Your Email : <span class="text-red-600">*</span></label>
                                        <input type="email" class="form-input border border-slate-100 dark:border-slate-800 mt-2"
                                               value="{{auth()->user()->email}}"
                                               name="email" required="">
                                    @error('email')
                                    <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                    </div>

                                    <div class="lg:col-span-6">
                                        <label class="form-label font-medium" for="birthday">Date of Birth :</label>
                                        <input type="date" id="birthday" name="dob"
                                               class="form-input border border-slate-100 dark:border-slate-800 mt-2"
                                                value="{{auth()->user()->dob ?? null}}">
                                    @error('dob')
                                    <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                    </div>

                                    <div class="lg:col-span-12">
                                        <label class="form-label font-medium">Your Address :</label>
                                        <input type="address" class="form-input border border-slate-100 dark:border-slate-800 mt-2"
                                               value="{{auth()->user()->address}}"
                                               name="address" required="">
                                    @error('address')
                                    <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                    </div>

                                    <div class="lg:col-span-3">
                                        <label class="form-label font-medium">State :</label>
                                        <input type="text" class="form-input border border-slate-100 dark:border-slate-800 mt-2"
                                               value="{{auth()->user()->state}}"
                                               name="state" required="">
                                    @error('state')
                                    <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                    </div>

                                    <div class="lg:col-span-3">
                                        <label class="form-label font-medium">Country :</label>
                                        <input type="text" class="form-input border border-slate-100 dark:border-slate-800 mt-2"
                                               value="{{auth()->user()->country ?? null}}"
                                               name="country" required="">
                                    @error('country')
                                    <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                    </div>

                                    <div class="lg:col-span-3">
                                        <label class="form-label font-medium">Timezone :</label>
                                        <select name="timezone" class="form-select form-input border border-slate-100 dark:border-slate-800 block w-full mt-2">
                                            <option value="{{auth()->user()->timezone}}">{{auth()->user()->timezone}}</option>
                                            <option value="NY">USA</option>
                                            <option value="MC">UK</option>
                                            <option value="SC">India</option>
                                        </select>
                                    @error('timezone')
                                    <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                    </div>

                                    <div class="lg:col-span-2">
                                        <label class="form-label font-medium">Postal Code :</label>
                                        <input type="number" class="form-input border border-slate-100 dark:border-slate-800 mt-2"
                                               value="{{auth()->user()->postcode}}"
                                               name="postcode" required="">
                                    @error('postcode')
                                    <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                    </div>

                                    <div class="lg:col-span-6">
                                        <label class="form-label font-medium">Mobile No. :</label>
                                        <input type="number" class="form-input border border-slate-100 dark:border-slate-800 mt-2"
                                               value="{{auth()->user()->phone}}"`
                                               name="phone" required="">
                                    @error('phone')
                                    <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                    </div>

                                    <div class="lg:col-span-6">
                                        <label class="form-label font-medium">Occupation :</label>
                                        <input type="text" class="form-input border border-slate-100 dark:border-slate-800 mt-2"
                                                  value="{{auth()->user()->occupation}}"
                                               name="occupation" required="">
                                    @error('occupation')
                                    <span class="text-red-600">{{$message}}</span>
                                    @enderror
                                    </div>
                                </div><!--end grid-->

                                <div class="grid grid-cols-1">
                                    <div class="mt-5">
                                        <label class="form-label font-medium">Introduce yourself : </label>
                                        <textarea name="bio" id="comments" class="form-input border border-slate-100 dark:border-slate-800 mt-2 textarea"
                                                  >{{auth()->user()->bio}}</textarea>
                                        @error('comments')
                                        <span class="text-red-600">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div><!--end row-->

                                <button type="submit" class="btn bg-emerald-600 hover:bg-emerald-700 text-white rounded-md mt-5">Update Personal Info</button>
                            </form><!--end form-->
                        </div>
                    </div>

                    <div class="lg:col-span-6">
                        <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <h5 class="text-lg font-semibold mb-4">Skills :</h5>
                                    <form>
                                        <div class="grid grid-cols-1 gap-4">
                                            <div class="">
                                                <label class="form-label font-medium" for="WordPress">WordPress</label>
                                                <input type="number" class="form-input border border-slate-100 dark:border-slate-800 mt-2" placeholder="First Name:" id="WordPress" name="number" required="">
                                            </div>

                                            <div class="">
                                                <label class="form-label font-medium" for="JavaScript">JavaScript</label>
                                                <input type="number" class="form-input border border-slate-100 dark:border-slate-800 mt-2" placeholder="First Name:" id="JavaScript" name="number" required="">
                                            </div>

                                            <div class="">
                                                <label class="form-label font-medium" for="HTML">HTML</label>
                                                <input type="number" class="form-input border border-slate-100 dark:border-slate-800 mt-2" placeholder="First Name:" id="HTML" name="number" required="">
                                            </div>

                                            <div class="">
                                                <label class="form-label font-medium" for="Figma">Figma</label>
                                                <input type="number" class="form-input border border-slate-100 dark:border-slate-800 mt-2" placeholder="First Name:" id="Figma" name="number" required="">
                                            </div>

                                            <div class="">
                                                <label class="form-label font-medium" for="Photoshop">Photoshop</label>
                                                <input type="number" class="form-input border border-slate-100 dark:border-slate-800 mt-2" placeholder="First Name:" id="Photoshop" name="number" required="">
                                            </div>

                                            <div class="">
                                                <label class="form-label font-medium" for="Illustration">Illustration</label>
                                                <input type="number" class="form-input border border-slate-100 dark:border-slate-800 mt-2" placeholder="First Name:" id="Illustration" name="number" required="">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn bg-emerald-600 hover:bg-emerald-700 text-white rounded-md mt-5">Update Personal Info</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-6">
                        <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <h5 class="text-lg font-semibold mb-4">Experience :</h5>

                                    <div>
                                        <div>
                                            <div class="preview-box flex justify-center rounded-md shadow dark:shadow-gray-800 overflow-hidden bg-gray-50 dark:bg-slate-800 text-slate-400 p-2 text-center small">Supports JPG, PNG and MP4 videos. Max file size : 10MB.</div>
                                            <input type="file" id="input-file" name="input-file" accept="image/*" onchange={handleChange()} hidden>
                                            <label class="btn-upload btn bg-emerald-600 hover:bg-emerald-700 text-white rounded-md mt-5 cursor-pointer" for="input-file">Upload Image</label>
                                        </div>
                                        <form>
                                            <div class="grid grid-cols-12 mt-6 gap-4">
                                                <div class="col-span-12">
                                                    <label class="form-label font-medium">Job Title <span class="text-red-600">*</span></label>
                                                    <input name="name" id="JobTitle" type="text" class="form-input border border-slate-100 dark:border-slate-800" placeholder="Title :">
                                                </div><!--end col-->

                                                <div class="col-span-12">
                                                    <label class="form-label font-medium">Company Name <span class="text-red-600">*</span></label>
                                                    <input name="name" id="CompanyName" type="text" class="form-input border border-slate-100 dark:border-slate-800" placeholder="Company :">
                                                </div><!--end col-->

                                                <div class="col-span-12">
                                                    <label class="form-label font-medium">Year <span class="text-red-600">*</span></label>
                                                    <input name="number" id="Year" type="number" class="form-input border border-slate-100 dark:border-slate-800" placeholder="Year :">
                                                </div><!--end col-->

                                                <div class="col-span-12">
                                                    <label class="form-label font-medium"> Description : </label>
                                                    <textarea name="comments" id="Description" class="form-input border border-slate-100 dark:border-slate-800 textarea" placeholder="Description :"></textarea>
                                                </div><!--end col-->
                                            </div>
                                        </form>

                                        <input type="submit" id="submit" name="send" class="btn bg-emerald-600 hover:bg-emerald-700 text-white rounded-md mt-5" value="Save Changes">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-12">
                        <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-4">
                                <div>
                                    <h5 class="text-lg font-semibold mb-4">Contact Info :</h5>

                                    <form action="{{route('contact-info.update')}}" method="POST">
                                        @csrf
                                        <div class="grid grid-cols-1 gap-4">
                                            <div>
                                                <label class="form-label font-medium">Phone No. :</label>
                                                <input name="phone" value="{{auth()->user()->phone}}" id="number" type="number"
                                                       class="form-input border border-slate-100 dark:border-slate-800 mt-2"
                                                       placeholder="Phone :">
                                            @error('phone')
                                            <span class="text-red-600">{{$message}}</span>
                                            @enderror
                                            </div>

                                            <div>
                                                <label class="form-label font-medium">Website :</label>
                                                <input name="website"
                                                       value="{{auth()->user()->website}}"
                                                       id="url" type="url" class="form-input border border-slate-100 dark:border-slate-800 mt-2"
                                                       placeholder="Url :">
                                            @error('website')
                                            <span class="text-red-600">{{$message}}</span>
                                            @enderror
                                            </div>
                                        </div><!--end grid-->

                                        <button class="btn bg-emerald-600 hover:bg-emerald-700 text-white rounded-md mt-5">Update Contact Info</button>
                                    </form>
                                </div><!--end col-->

                                <div>
                                    <h5 class="text-lg font-semibold mb-4">Change password :</h5>
                                    <form action="{{route('password.update')}}" method="POST">
                                        @csrf
                                        <div class="grid grid-cols-1 gap-4">
                                            <div>
                                                <label class="form-label font-medium">Old password :</label>
                                                <input type="password"
                                                       name="current_password"
                                                       class="form-input border border-slate-100 dark:border-slate-800 mt-2" placeholder="Old password" required="">
                                            </div>

                                            <div>
                                                <label class="form-label font-medium">New password :</label>
                                                <input type="password"
                                                       name="password"
                                                       class="form-input border border-slate-100 dark:border-slate-800 mt-2" placeholder="New password" required="">
                                            </div>

                                            <div>
                                                <label class="form-label font-medium">Re-type New password :</label>
                                                <input type="password"
                                                       name="password_confirmation"
                                                       class="form-input border border-slate-100 dark:border-slate-800 mt-2" placeholder="Re-type New password" required="">
                                            </div>
                                        </div><!--end grid-->

                                        <button class="btn bg-emerald-600 hover:bg-emerald-700 text-white rounded-md mt-5">Save password</button>
                                    </form>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div>

                    <div class="lg:col-span-12">
                        <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                            <h5 class="text-lg font-semibold mb-4">Social Media :</h5>

                            <form action="{{route('social-media-info.update')}}" method="POST">
                                @csrf
                            <div class="md:flex">
                                <div class="md:w-1/3">
                                    <span class="font-medium">Twitter</span>
                                </div>

                                <div class="md:w-2/3 mt-4 md:mt-0">

                                        <div class="form-icon relative">
                                            <i data-feather="twitter" class="size-4 absolute top-5 start-4"></i>
                                            <input type="text"
                                                   class="form-input border border-slate-100 dark:border-slate-800 mt-2 ps-12"
                                                   value="{{auth()->user()->twitter}}" id="twitter_name" name="twitter" required="">
                                        </div>


                                    <p class="text-slate-400 mt-1">Add your Twitter username (e.g. jennyhot).</p>
                                </div>
                            </div>

                            <div class="md:flex mt-8">
                                <div class="md:w-1/3">
                                    <span class="font-medium">Facebook</span>
                                </div>

                                <div class="md:w-2/3 mt-4 md:mt-0">

                                        <div class="form-icon relative">
                                            <i data-feather="facebook" class="size-4 absolute top-5 start-4"></i>
                                            <input type="text"
                                                   class="form-input border border-slate-100 dark:border-slate-800 mt-2 ps-12"
                                                   value="{{auth()->user()->facebook}}" id="facebook_name" name="facebook" required="">
                                        </div>


                                    <p class="text-slate-400 mt-1">Add your Facebook username (e.g. jennyhot).</p>
                                </div>
                            </div>

                            <div class="md:flex mt-8">
                                <div class="md:w-1/3">
                                    <span class="font-medium">Github</span>
                                </div>

                                <div class="md:w-2/3 mt-4 md:mt-0">

                                        <div class="form-icon relative">
                                            <i data-feather="github" class="size-4 absolute top-5 start-4"></i>
                                            <input type="text"
                                                   class="form-input border border-slate-100 dark:border-slate-800 mt-2 ps-12"
                                                   value="{{auth()->user()->github}}" id="git_name" name="github" required="">
                                        </div>


                                    <p class="text-slate-400 mt-1">Add your Github username (e.g. jennyhot).</p>
                                </div>
                            </div>

                            <div class="md:flex mt-8">
                                <div class="md:w-1/3">
                                    <span class="font-medium">Linkedin</span>
                                </div>

                                <div class="md:w-2/3 mt-4 md:mt-0">

                                        <div class="form-icon relative">
                                            <i data-feather="linkedin" class="size-4 absolute top-5 start-4"></i>
                                            <input type="text"
                                                   class="form-input border border-slate-100 dark:border-slate-800 mt-2 ps-12"
                                                   value="{{auth()->user()->linkedin}}" id="linkedin_name" name="linkedin" required="">
                                        </div>


                                    <p class="text-slate-400 mt-1">Add your Linkedin username.</p>
                                </div>
                            </div>

                            <div class="md:flex">
                                <div class="md:w-1/3">
                                    <button type="submit" class="btn bg-emerald-600 hover:bg-emerald-700 text-white rounded-md mt-5">Update Social Info</button>
                                </div>

                            </div>
                            </form>

                        </div>

                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- End Hero -->
@endsection
@push('extra-js')



@endpush
