<div class="containers">
    <h4>Search Any Request</h4>
    <input type="text" id="request_search" class="form-control"
        placeholder="Type name (child/spouse/fullname/requester)...">

    <div class="mt-3" id="search_results">
        <!-- Live search results will appear here -->
    </div>
</div>

<script>
    document.getElementById('request_search').addEventListener('input', function() {
        let term = this.value;
        if (term.length >= 2) {
            fetch(`/search-requests?term=${encodeURIComponent(term)}`)
                .then(res => res.json())
                .then(data => {
                    let html = '';

                    // Helper to show image preview (assumes image is in /storage)
                    const renderIdProof = (path) => {
                        if (!path) return '<em>No ID Provided</em>';
                        return `<br><img src="/storage/${path}" alt="ID Proof" style="max-width: 150px; max-height: 150px; border: 1px solid #ccc; padding: 3px;">`;
                    };

                    // Baptism Requests
                    if (data.baptism.length) {
                        html += '<h5>Baptism Requests</h5>';
                        data.baptism.forEach(item => {
                            html += `
                                <div class="border p-2 mb-2">
                                    <strong>Requester:</strong> ${item.requester}<br>
                                    <strong>Child:</strong> ${item.childName}<br>
                                    <strong>Date:</strong> ${item.baptismDate}<br>
                                    <strong>Purpose:</strong> ${item.purpose}<br>
                                    <strong>ID Proof:</strong> ${renderIdProof(item.idProof)}
                                     <br>


    <button type="submit" class="btn btn-success mt-2">Send Certificate</button>


                                </div>`;
                        });
                    }

                    // Confirmation Requests
                    if (data.confirmation.length) {
                        html += '<h5>Confirmation Requests</h5>';
                        data.confirmation.forEach(item => {
                            html += `
                                <div class="border p-2 mb-2">
                                    <strong>Requester:</strong> ${item.requester}<br>
                                    <strong>Confirmed Name:</strong> ${item.confirmedName}<br>
                                    <strong>Date:</strong> ${item.confirmationDate}<br>
                                    <strong>Reason:</strong> ${item.reason}<br>
                                    <strong>ID Proof:</strong> ${renderIdProof(item.idProof)}
                                     <br>


    <button type="submit" class="btn btn-success mt-2">Send Certificate</button>


                                </div>`;
                        });
                    }

                    // Marriage Requests
                    if (data.marriage.length) {
                        html += '<h5>Marriage Requests</h5>';
                        data.marriage.forEach(item => {
                            html += `
                                <div class="border p-2 mb-2">
                                    <strong>Requester:</strong> ${item.requester}<br>
                                    <strong>Spouses:</strong> ${item.spouse1} & ${item.spouse2}<br>
                                    <strong>Date:</strong> ${item.marriageDate}<br>
                                    <strong>Purpose:</strong> ${item.purpose}<br>
                                    <strong>ID Proof:</strong> ${renderIdProof(item.idProof)}
                                     <br>


    <button type="submit" class="btn btn-success mt-2">Send Certificate</button>


                                </div>`;
                        });
                    }

                    // Death Requests
                    if (data.death.length) {
                        html += '<h5>Death Certificate Requests</h5>';
                        data.death.forEach(item => {
                            html += `
                                <div class="border p-2 mb-2">
                                    <strong>Requester:</strong> ${item.requester}<br>
                                    <strong>Deceased:</strong> ${item.fullName}<br>
                                    <strong>Date:</strong> ${item.deathDate}<br>
                                    <strong>Purpose:</strong> ${item.purpose}<br>
                                    <strong>ID Proof:</strong> ${renderIdProof(item.idProof)}
                                     <br>

    <button type="submit" class="btn btn-success mt-2">Send Certificate</button>


                                </div>`;
                        });
                    }

                    if (html === '') html = '<p>No results found.</p>';
                    document.getElementById('search_results').innerHTML = html;
                });
        } else {
            document.getElementById('search_results').innerHTML = '';
        }
    });
</script>



<style>
    body {



        display: flex;
        justify-content: center;
        align-items: center;
        /* Align items to the top */

    }

    .containers {
        max-width: 600px;
        width: 100%;
        background-color: var(--c-gray-600);
        ;
        /* White background for the container */
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 20px;
        position: relative;
        /* Position relative for absolute children */
    }

    h4 {
        color: white;
        /* Green */
        text-align: center;
        margin-bottom: 20px;
    }

    .form-control {
        width: 100%;
        border: 2px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #4b8b3b;
        /* Green */
        outline: none;
        box-shadow: 0 0 5px rgba(75, 139, 59, 0.5);
    }

    .containers #search_results {
        margin-top: 20px;
        max-height: 400px;
        /* Limit height of results */
        overflow-y: auto;
        /* Scroll when results exceed max height */
    }

    h5 {
        color: white;
        /* Gray */
        margin-top: 20px;
        text-align: left;
    }

    .border {
        border: 1px solid var(--c-gray-500);
        border-radius: 5px;
            background-color: var(--c-gray-800);
        padding: 15px;
        margin-bottom: 10px;
        transition: background-color 0.3s;
    }

 
    strong {
        color: #4b8b3b;
        display: inline-block;
        margin-bottom: 5px;
    }

    em {
        color: white;
        font-style: normal;
    }

    .request-info {
        margin-bottom: 10px;
    }
</style>
