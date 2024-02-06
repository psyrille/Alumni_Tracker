 <!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-dialog-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Work</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form id="formWorkHistory">
                 <div class="modal-body">
                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <span class="input-group-text">Work Year</span>
                         </div>
                         <input type="number" id="work-year" name="workYear" class="form-control" min="1900"
                             max="{{ Illuminate\Support\Carbon::now()->format('Y') }}" step="1"
                             placeholder="{{ Illuminate\Support\Carbon::now()->format('Y') }}" required>
                     </div>
                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <span class="input-group-text">Work Name</span>
                         </div>
                         <input type="text" id="work-name" name="workName" class="form-control"
                             placeholder="Software Developer" required>
                     </div>
                     <ul class="list-group mb-3">
                         <li class="list-group-item">Work Address</li>
                         <li class="list-group-item">
                             <select name="work_country" id="work-country" class="form-select form-select-sm">
                                 <option value="0">- - Select Country - -</option>
                                 @foreach (GENERAL::Country() as $country)
                                     <option value="{{ $country->iso }}">{{ $country->name }}</option>
                                 @endforeach
                             </select>
                         </li>
                         <li class="list-group-item">
                             <select id="select-region" class="form-select form-select-sm" name="work_region">
                                 <option value="0"></option>
                                 @foreach (GENERAL::Region() as $region)
                                     <option value="{{ $region->regCode }}" region_name="{{ $region->regDesc }}">
                                         {{ $region->regDesc }}</option>
                                 @endforeach
                             </select>
                         </li>
                         <li class="list-group-item">
                             <select name="work_province" id="select-province" class="form-select form-select-sm">
                                 <option value="0"></option>
                             </select>
                         </li>
                         <li class="list-group-item">
                             <select name="work_municipality" id="select-municipality"
                                 class="form-select form-select-sm">
                                 <option value="0"></option>
                             </select>
                         </li>
                         <li class="list-group-item">
                             <select name="work_barangay" id="select-barangay" class="form-select form-select-sm">
                                 <option value="0"></option>
                             </select>
                         </li>
                     </ul>
                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <span class="input-group-text">Company Name</span>
                         </div>
                         <input type="text" id="work-company" name="workCompany" class="form-control"
                             placeholder="Teradyne" required>
                     </div>
                     <div class="input-group">
                         <div class="input-group-prepend">
                             <span class="input-group-text">Company Contact</span>
                         </div>
                         <input type="text" id="work-contact" name="workContact" class="form-control"
                             placeholder="0910325341" required>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Add Work</button>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="editAboutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit About</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body d-flex flex-column gap-2">
                 <form id="formEditAbout">
                     <ul class="list-group">
                         <li class="list-group-item">
                             <span><b>Name</b>: {{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}</span>
                         </li>
                         <li class="list-group-item">
                             <span><b>Course</b>: {{ Auth::user()->course }}</span>
                         </li>
                         <li class="list-group-item">
                             <span><b>Course</b>: {{ Auth::user()->yearGrad }}</span>
                         </li>
                         <li class="list-group-item">
                             <div class="d-flex align-items-center gap-3">
                                 <span><b>Address</b>:</span>
                                 <input type="text" class="form-control form-control-sm" name="edit_address"
                                     value="{{ Auth::user()->address }}" required>
                             </div>
                         </li>
                     </ul>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary"
                     {{ Auth::user()->status == 'pending' ? 'disabled' : '' }}>Edit Profile</button>
             </div>
             </form>
         </div>
     </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="editContactModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit About</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body d-flex flex-column gap-2">
                 <form id="formEditContact">
                     <ul class="list-group">
                         <li class="list-group-item">
                             <div class="d-flex align-items-center gap-3">
                                 <span class="text-nowrap"><b>Facebook Account</b>:</span>
                                 <input type="text" class="form-control form-control-sm" name="edit_facebook"
                                     value="{{ Auth::user()->facebook }}" required>
                             </div>
                         </li>
                         <li class="list-group-item">
                             <div class="d-flex align-items-center gap-3">
                                 <span class="text-nowrap"><b>Contact No</b>:</span>
                                 <input type="text" class="form-control form-control-sm" name="edit_contact"
                                     value="{{ Auth::user()->contactNo }}" required>
                             </div>
                         </li>

                     </ul>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary"
                     {{ Auth::user()->status == 'pending' ? 'disabled' : '' }}>Edit Profile</button>
             </div>
             </form>
         </div>
     </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="editAccountModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit About</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body d-flex flex-column gap-2">
                 <form id="formEditAccount">
                     <ul class="list-group">
                         <li class="list-group-item">
                             <div class="d-flex align-items-center gap-3">
                                 <span class="text-nowrap"><b>Email</b>:</span>
                                 <input type="text" class="form-control form-control-sm" name="edit_email"
                                     value="{{ Auth::user()->email }}" required>
                             </div>
                         </li>
                         <li class="list-group-item">
                             <div class="d-flex align-items-center gap-3">
                                 <span class="text-nowrap"><b>Password</b>:</span>
                                 <div class="form-password-toggle">
                                     <div class="input-group input-group-merge">
                                         <input type="password" id="edit-password"
                                             class="form-control form-control-sm" name="edit_password"
                                             placeholder="Password" aria-describedby="password" />
                                         <span class="input-group-text cursor-pointer"><i
                                                 class="bx bx-hide"></i></span>
                                     </div>
                                 </div>
                                 <span class="confirm-message"></span>
                             </div>
                         </li>
                         <li class="list-group-item">
                             <div class="d-flex align-items-center gap-3">
                                 <span class="text-nowrap"><b>Confirm Password</b>:</span>
                                 <div class="form-password-toggle">
                                     <div class="input-group input-group-merge">
                                         <input type="password" id="edit-confirm-password"
                                             class="form-control form-control-sm" name="edit_confirm_password"
                                             placeholder="Password" aria-describedby="password" />
                                         <span class="input-group-text cursor-pointer"><i
                                                 class="bx bx-hide"></i></span>
                                     </div>
                                 </div>
                                 <span class="confirm-message"></span>
                             </div>
                         </li>
                     </ul>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary"
                     {{ Auth::user()->status == 'pending' ? 'disabled' : '' }}>Edit Profile</button>
             </div>
             </form>
         </div>
     </div>
 </div>
