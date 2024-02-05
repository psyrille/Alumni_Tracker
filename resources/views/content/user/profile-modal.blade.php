 <!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
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
                         <input type="number" name="workYear" class="form-control" min="1900"
                             max="{{ Illuminate\Support\Carbon::now()->format('Y') }}" step="1"
                             placeholder="{{ Illuminate\Support\Carbon::now()->format('Y') }}">
                     </div>
                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <span class="input-group-text">Work Name</span>
                         </div>
                         <input type="text" name="workName" class="form-control" placeholder="Software Developer">
                     </div>
                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <span class="input-group-text">Work Address</span>
                         </div>
                         <input type="text" name="workAddress" class="form-control"
                             placeholder="Lapu-lapu Cebu City">
                     </div>
                     <div class="input-group mb-3">
                         <div class="input-group-prepend">
                             <span class="input-group-text">Company Name</span>
                         </div>
                         <input type="text" name="workCompany" class="form-control" placeholder="Teradyne">
                     </div>
                     <div class="input-group">
                         <div class="input-group-prepend">
                             <span class="input-group-text">Company Contact</span>
                         </div>
                         <input type="text" name="workContact" class="form-control" placeholder="Teradyne">
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
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit About</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form id="formEditAbout">
                 <div class="modal-body d-flex flex-column gap-2">
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
                                 <select name="" id="select-region" class="form-select form-select-sm">
                                     @foreach (GENERAL::Region() as $region)
                                         <option value="{{ $region->regCode }}">{{ $region->regDesc }}</option>
                                     @endforeach
                                 </select>
                                 <select name="" id="select-province" class="form-select form-select-sm">

                                 </select>
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
