 <style>
     .report-wrapper {
         padding: 2rem;
         background-color: #f4f7fc;
         font-family: 'Segoe UI', sans-serif;
         height: 30rem;
         overflow-y: auto;
         border-radius: 10px;
         height: 30rem;
         overflow-y: auto;
     }

     .report-header {
         text-align: center;
         margin-bottom: 30px;
     }

     .report-header h2 {
         font-size: 32px;
         color: #1a237e;
     }

     .donation-cards {
         display: grid;
         grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
         gap: 1.5rem;
     }

     .donation-card {
         background: #ffffff;
         border-radius: 12px;
         padding: 20px;
         box-shadow: 0 6px 15px rgba(0, 0, 0, 0.06);
         transition: transform 0.3s ease;
         position: relative;
     }

     .donation-card:hover {
         transform: translateY(-5px);
     }

     .donation-amount {
         font-size: 22px;
         font-weight: bold;
         color: #388e3c;
         margin-bottom: 10px;
     }

     .donor-name {
         font-size: 18px;
         font-weight: 600;
         margin-bottom: 8px;
         color: #333;
     }

     .donation-meta {
         font-size: 14px;
         color: #666;
         margin-bottom: 6px;
     }

     .report-summary {
         margin-top: 40px;
         text-align: right;
         font-size: 20px;
         font-weight: bold;
         color: #1b5e20;
     }

     .donation-cards p {
         color: black;
     }
 </style>

 <div class="report-wrapper">
     <div class="report-header">
         <h2>Parish Donation Financial Report</h2>
     </div>

     <div class="donation-cards">
         @php $total = 0; @endphp
         @forelse ($donations as $donation)
             @php $total += $donation->amount; @endphp
             <div class="donation-card">
                 <div class="donation-amount">₱{{ number_format($donation->amount, 2) }}</div>
                 <div class="donor-name">
                     {{ $donation->member->fullname }}
                 </div>
                 <div class="donation-meta">
                     Type: {{ ucfirst($donation->donation_type) }}
                 </div>
                 <div class="donation-meta">
                     Date: {{ \Carbon\Carbon::parse($donation->donation_date)->format('M d, Y') }}
                 </div>
                 <div class="donation-meta">
                     Payment: {{ ucfirst($donation->payment_method) }}
                 </div>
                 <div class="donation-meta">
                     Reference No: {{ ucfirst($donation->reference_no) }}
                 </div>
             </div>
         @empty
             <p>No donation records available.</p>
         @endforelse
     </div>

     <div class="report-summary">
         Total Donations: ₱{{ number_format($total, 2) }}
     </div>
 </div>
