<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
 <link rel="stylesheet" href="{{asset('css/documentRequest.css')}}">
</head>
<body>
 <div class="container">
 <div class="title">
   <h1>Document Request Form</h1>
  </div>
  <div class="Content">

  <form action="{{ route('user.document_requests.store') }}" method="POST">
  @csrf
   <div class="form-list">
      <div class="form-container">
      <label for="Full name">Full name</label>
          <div class="form-input">
            <div class="form-sub">
            <input type="text" name="firstname" required>
            <label for="firstname">First Name</label>
            </div>
            <div class="form-sub">
            <input type="text" name="lastname" required>
            <label for="">Last Name</label>
            </div>
          </div>
      </div>
    <div class="form-container">
       <label for="Date Of Birth">Date Of Birth</label>
            <div class="form-input">
                <div class="form-sub">
                   <input type="date" name="dateofbirth" required>
                   <label for="dateofbirth">Date</label>
                </div>
            </div>
    </div>
   </div>

   <div class="form-list">
       <div class="form-container">
           <label for="Addres">Address</label>
                <div class="form-input">
                    <div class="form-sub">
                       <input type="text" name="streetaddress" required>
                       <label for="streetaddress">Street Address</label>
                    </div>
                </div>
                <div class="form-input">
                    <div class="form-sub">
                       <input type="text" name="city" required>
                       <label for="streetaddress">City</label>
                    </div>
                    <div class="form-sub">
                       <input type="text" name="state">
                       <label for="streetaddress">State/Province</label>
                    </div>
                </div>
                <div class="form-input">
                    <div class="form-sub">
                       <input type="text" name="zip" required>
                       <label for="zip">Zip Code</label>
                    </div>
                </div>
        </div>
   </div>
   
   <div class="form-list">
     <div class="form-container">
        <label for="email">Email</label>
            <div class="form-input">
                <div class="form-sub">
                   <input type="email" name="email" required>
                   <label for="firstname">Email</label>
                </div>
            </div>
        </div>
        <div class="form-container">
        <label for="phonenumber">Phone Number</label>
            <div class="form-input">
                <div class="form-sub">
                   <input type="text" name="phonenumber" required>
                   <label for="phonenumber">Enter valid phone number</label>
                </div>   
            </div>
        </div>
   </div>
   
   <div class="form-list">
      <div class="form-container">
          <label for="documenttype">Document Type</label>
            <div class="form-input">
                <select name="documenttype" required>
                    <option value="baptismal">Baptismal</option>
                    <option value="confirmation">Confirmation</option>
                    <option value="marriagecertificate">Marriage Certificate</option>
                </select>
            </div>
       </div>
   </div>
 
   <div class="form-list">
      <div class="form-container">
          <label for="reason">Reason Of Requesting</label>
            <div class="form-input">
            <textarea name="reason" rows="4" placeholder="Enter your reason here..." required></textarea>
            </div>
       </div>
   </div>
  
   <div class="form-list">
      <div class="form-container">
            <div class="form-input">
           <input  type="submit"  onclick="return confirm('Submit this information?')"  value="submit">
            </div>
       </div>
   </div>
   </form>

   </div>
 </div>
</body>
</html>