document.addEventListener("DOMContentLoaded", () => {
    const maincontent = document.getElementById("maincontent");
    const dashboard = document.getElementById("dashboard");
    dashboard.style.color = "white";

    fetch("/document-counts")
        .then((response) => response.json())
        .then((data) => {
            maincontent.innerHTML = `
      <section id="service-section" class="service-section">
        <h2>Number Of Document Request</h2>
        <div class="service-section-header">
          <div class="search-field">
            <i class="ph-magnifying-glass"></i>
            <input
              class="Reference-code"
              type="text"
              placeholder="Reference Code"
            />
          </div>
          <div class="dropdown-field">
            <select>
              <option>Baptismal</option>
              <option>Confirmation</option>
              <option>Marriage Certificates</option>
            </select>
            <i class="ph-caret-down"></i>
          </div>
          <button class="flat-button">Search</button>
        </div>
        <div class="mobile-only">
          <button class="flat-button">Toggle search</button>
        </div>
        <div class="tiles">
          <article class="tile">
            <div class="tile-header">
              <i class="ph-lightning-light"></i>
              <h3>
                <span>Baptismal</span>
                <span>Sacramental Validation</span>
              </h3>
            </div>
            <div class="total">
              <h1 style="text-align: center">+${data.baptismal}</h1>
            </div>
            <a href="#">
   
            </a>
          </article>
          <article class="tile">
            <div class="tile-header">
              <i class="ph-fire-simple-light"></i>
              <h3>
                <span>Confirmation</span>
                <span>Clergy Approval</span>
              </h3>
            </div>
            <div class="total">
              <h1 style="text-align: center">+${data.confirmation}</h1>
            </div>
            <a href="#">
         
            </a>
          </article>
          <article class="tile">
            <div class="tile-header">
              <i class="ph-file-light"></i>
              <h3>
                <span>Marriage Cert.</span>
                <span>Legal Validation</span>
              </h3>
            </div>
            <div class="total">
              <h1 style="text-align: center">+${data.marriage}</h1>
            </div>
            <a href="#">
            
            </a>
          </article>
        </div>
        <div class="service-section-footer">
          <p>
            Document requests are processed based on parish guidelines and
            requirements.
          </p>
        </div>
      </section>
  
      <section id="transfer-section" class="transfer-section">
        <div class="transfer-section-header">
          <h2>Latest Request</h2>
        </div>
        <div class="transfers">
          <div class="transfer">
            <div class="transfer-logo">
              <img src="./assets/bapstismal.png" />
            </div>
            <dl class="transfer-details">
              <div>
                <dt>Baptismal</dt>
                <dd>Jerlyn Kayi</dd>
              </div>
              <div>
                <dt>4012028394</dt>
                <dd>Reqest ID</dd>
              </div>
              <div>
                <dt>14 Feb. 2025</dt>
                <dd>Approved</dd>
              </div>
            </dl>
          </div>
          <div class="transfer">
            <div class="transfer-logo">
              <img src="{{ asset('img/baptismal.png') }}" />
            </div>
            <dl class="transfer-details">
              <div>
                <dt>Confirmation</dt>
                <dd>Mary Cris</dd>
              </div>
              <div>
                <dt>5214453765</dt>
                <dd>Reference code</dd>
              </div>
              <div>
                <dt>01 Mar. 2025</dt>
                <dd>Approved</dd>
              </div>
            </dl>
          </div>
          <div class="transfer">
            <div class="transfer-logo">
              <img src="./assets/marriage.png" />
            </div>
            <dl class="transfer-details">
              <div>
                <dt>Marriage Certificate</dt>
                <dd>Angelica Bitter</dd>
              </div>
              <div>
                <dt>2228836583</dt>
                <dd>Reference code</dd>
              </div>
              <div>
                <dt>16 Mar. 2025</dt>
                <dd>Approved</dd>
              </div>
            </dl>
          </div>
        </div>
      </section>
    `;
        })
        .catch((error) =>
            console.error("Error fetching document counts:", error)
        );
});
function showDashboard() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    document.getElementById("dropdownmenu").style.display = "none";
    document.getElementById("createdropdownmenu").style.display = "none";
    document.getElementById("financialdropdownmenu").style.display = "none";
    document.getElementById("eventdropdownmenu").style.display = "none";
    document.getElementById("clergydropdownmenu").style.display = "none";
    document.getElementById("reportdropdownmenu").style.display = "none";
    showLoading(); // Show loading spinner
    fetch("/document-counts")
        .then((response) => response.json())
        .then((data) => {
            maincontent.innerHTML = `
      <section id="service-section" class="service-section">
        <h2>Number Of Document Request</h2>
        <div class="service-section-header">
          <div class="search-field">
            <i class="ph-magnifying-glass"></i>
            <input
              class="Reference-code"
              type="text"
              placeholder="Reference Code"
            />
          </div>
          <div class="dropdown-field">
            <select>
              <option>Baptismal</option>
              <option>Confirmation</option>
              <option>Marriage Certificates</option>
            </select>
            <i class="ph-caret-down"></i>
          </div>
          <button class="flat-button">Search</button>
        </div>
        <div class="mobile-only">
          <button class="flat-button">Toggle search</button>
        </div>
        <div class="tiles">
          <article class="tile">
            <div class="tile-header">
              <i class="ph-lightning-light"></i>
              <h3>
                <span>Baptismal</span>
                <span>Sacramental Validation</span>
              </h3>
            </div>
            <div class="total">
              <h1 style="text-align: center">+${data.baptismal}</h1>
            </div>
            <a href="#">
          
            </a>
          </article>
          <article class="tile">
            <div class="tile-header">
              <i class="ph-fire-simple-light"></i>
              <h3>
                <span>Confirmation</span>
                <span>Clergy Approval</span>
              </h3>
            </div>
            <div class="total">
              <h1 style="text-align: center">+${data.confirmation}</h1>
            </div>
            <a href="#">
             
            </a>
          </article>
          <article class="tile">
            <div class="tile-header">
              <i class="ph-file-light"></i>
              <h3>
                <span>Marriage Cert.</span>
                <span>Legal Validation</span>
              </h3>
            </div>
            <div class="total">
              <h1 style="text-align: center">+${data.marriage}</h1>
            </div>
            <a href="#">
           
            </a>
          </article>
        </div>
        <div class="service-section-footer">
          <p>
            Document requests are processed based on parish guidelines and
            requirements.
          </p>
        </div>
      </section>
  
      <section id="transfer-section" class="transfer-section">
        <div class="transfer-section-header">
          <h2>Latest Request</h2>
          <div class="filter-options">
            <p>Filter selected: Approved</p>
            <button class="icon-button">
              <i class="ph-funnel"></i>
            </button>
            <button class="icon-button">
              <i class="ph-plus"></i>
            </button>
          </div>
        </div>
        <div class="transfers">
          <div class="transfer">
            <div class="transfer-logo">
              <img src="./assets/bapstismal.png" />
            </div>
            <dl class="transfer-details">
              <div>
                <dt>Baptismal</dt>
                <dd>Jerlyn Kayi</dd>
              </div>
              <div>
                <dt>4012028394</dt>
                <dd>Reference code</dd>
              </div>
              <div>
                <dt>14 Feb. 2025</dt>
                <dd>Approved</dd>
              </div>
            </dl>
          </div>
          <div class="transfer">
            <div class="transfer-logo">
              <img src="{{ asset('img/baptismal.png') }}" />
            </div>
            <dl class="transfer-details">
              <div>
                <dt>Confirmation</dt>
                <dd>Mary Cris</dd>
              </div>
              <div>
                <dt>5214453765</dt>
                <dd>Reference code</dd>
              </div>
              <div>
                <dt>01 Mar. 2025</dt>
                <dd>Approved</dd>
              </div>
            </dl>
          </div>
          <div class="transfer">
            <div class="transfer-logo">
              <img src="./assets/marriage.png" />
            </div>
            <dl class="transfer-details">
              <div>
                <dt>Marriage Certificate</dt>
                <dd>Angelica Bitter</dd>
              </div>
              <div>
                <dt>2228836583</dt>
                <dd>Reference code</dd>
              </div>
              <div>
                <dt>16 Mar. 2025</dt>
                <dd>Approved</dd>
              </div>
            </dl>
          </div>
        </div>
      </section>
    `;
        })
        .catch((error) => {
            console.error("Error fetching document counts:", error);
            maincontent.innerHTML = `<div class="error-message">Error loading dashboard. Please try again.</div>`;
        });
}
function showUser() {
    const maincontent = document.getElementById("maincontent");
    const dashboard = document.getElementById("dashboard");
    if (maincontent) {
        dashboard.style.color = "#969593"; // Set the text color to a different color
        showLoading(); // Show loading spinner
        // Fetch the user view content
        fetch("/admin/user") // Adjust the URL as necessary
            .then((response) => response.text()) // Get the response text
            .then((html) => {
                maincontent.innerHTML = html; // Set the innerHTML to the fetched HTML
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showRequestStatus() {
    const maincontent = document.getElementById("certificate-options");
    if (maincontent) {
        dashboard.style.color = "#969593";
        fetch(loadRequestStatus, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
            });
    }
}

function showDocumentRequest() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "none";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch("/baptismrequest")
            .then((response) => response.text())
            .then((html) => {
                maincontent.innerHTML = html;
                attachRequestSearchHandler();
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function toggleDropdown(element) {
    document.getElementById("dropdownmenu").style.display = "block";
    document.getElementById("createdropdownmenu").style.display = "none";
    document.getElementById("financialdropdownmenu").style.display = "none";
    document.getElementById("eventdropdownmenu").style.display = "none";
    document.getElementById("clergydropdownmenu").style.display = "none";
    document.getElementById("reportdropdownmenu").style.display = "none";
}
function createtoggleDropdown() {
    document.getElementById("createdropdownmenu").style.display = "block";
    document.getElementById("dropdownmenu").style.display = "none";
    document.getElementById("financialdropdownmenu").style.display = "none";
    document.getElementById("eventdropdownmenu").style.display = "none";
    document.getElementById("clergydropdownmenu").style.display = "none";
    document.getElementById("reportdropdownmenu").style.display = "none";
}
function financialtoggleDropdown() {
    document.getElementById("financialdropdownmenu").style.display = "block";
    document.getElementById("createdropdownmenu").style.display = "none";
    document.getElementById("dropdownmenu").style.display = "none";
    document.getElementById("eventdropdownmenu").style.display = "none";
    document.getElementById("clergydropdownmenu").style.display = "none";
    document.getElementById("reportdropdownmenu").style.display = "none";
}
function eventtoggleDropdown() {
    document.getElementById("eventdropdownmenu").style.display = "block";
    document.getElementById("reportdropdownmenu").style.display = "none";
    document.getElementById("financialdropdownmenu").style.display = "none";
    document.getElementById("createdropdownmenu").style.display = "none";
    document.getElementById("dropdownmenu").style.display = "none";
    document.getElementById("clergydropdownmenu").style.display = "none";
}
function clergytoggleDropdown() {
    document.getElementById("clergydropdownmenu").style.display = "block";
    document.getElementById("reportdropdownmenu").style.display = "none";
    document.getElementById("eventdropdownmenu").style.display = "none";
    document.getElementById("financialdropdownmenu").style.display = "none";
    document.getElementById("createdropdownmenu").style.display = "none";
    document.getElementById("dropdownmenu").style.display = "none";
}
function reporttoggleDropdown() {
    document.getElementById("reportdropdownmenu").style.display = "block";
    document.getElementById("clergydropdownmenu").style.display = "none";
    document.getElementById("eventdropdownmenu").style.display = "none";
    document.getElementById("financialdropdownmenu").style.display = "none";
    document.getElementById("createdropdownmenu").style.display = "none";
    document.getElementById("dropdownmenu").style.display = "none";
    document.getElementById("payment-section").style.display = "block";
}
function showParishionerCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "none";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch("/admin/parishionerCreate")
            .then((response) => response.text())
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}

function showParishionerRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadParishionerRecord, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}

function showBaptistCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadBaptistCreate, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}

function showBaptistRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadBaptistRecord, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showConfirmationCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadConfirmationCreate, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showConfirmationRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadConfirmationRecord, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showMarriageCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadMarriageCreate, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showMarriageRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadMarriageRecord, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showDeathCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadDeathCreate, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showDeathRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadDeathRecord, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}

function showDonationCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadDonationCreate, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showDonationRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadDonationRecord, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showMassCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadMassCreate, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showMassRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadMassRecord, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}

function showEventCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadEventCreate, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showEventRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadEventRecord, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}

function showPriestAssignment() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadPriestAssignment, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}

function addPriest() {
    window.location.href = loadAddPriest;
}

function showStaffCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadStaffCreate, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showMemberStatistics() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadMemberStatistics, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}
function showFinancialReport() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading(); // Show loading spinner
        fetch(loadfinancialReport, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Fetch failed");
                return response.text();
            })
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) => {
                console.error("Error fetching user view:", error);
                maincontent.innerHTML = `<div class="error-message">Error loading content. Please try again.</div>`;
            });
    }
}

function addSendRequest() {
    const maincontent = document.getElementById("maincontent");
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        showLoading();
        fetch(loadsendRequest, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
        .then((response) => {
            if (!response.ok) throw new Error("Fetch failed");
            return response.text();
        })
        .then((html) => {
            maincontent.innerHTML = html;
            attachRequestSearchHandler(); // Attach search handler after loading content
        })
        .catch((error) => {
            console.error("Error fetching user view:", error);
        });
    }
}

function attachRequestSearchHandler() {
    const input = document.getElementById('request_search');
    const resultsDiv = document.getElementById('search_results');

    if (!input) return;

    input.addEventListener('input', function () {
        const term = this.value;
        if (term.length >= 2) {
            fetch(`/search-requests?term=${encodeURIComponent(term)}`)
                .then(res => res.json())
                .then(data => {
                    let html = '';

                    const renderIdProof = (path) => {
                        if (!path) return '<em>No ID Provided</em>';
                        return `<br><img src="/storage/${path}" alt="ID Proof" style="max-width: 150px; max-height: 150px;">`;
                    };

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
                                    <button class="btn btn-success mt-2">Send Certificate</button>
                                </div>`;
                        });
                    }

                    // Repeat similar logic for confirmation, marriage, and death...

                    if (!html) html = '<p>No results found.</p>';
                    resultsDiv.innerHTML = html;
                });
        } else {
            resultsDiv.innerHTML = '';
        }
    });
}
// Add loading functions at the beginning of the file
function showLoading() {
    const maincontent = document.getElementById("maincontent");
    if (maincontent) {
        maincontent.innerHTML = `
            <div class="loading-container">
                <div class="loading-spinner"></div>
                <p class="loading-text">Loading...</p>
            </div>
        `;
    }
}

function hideLoading() {
    const loadingContainer = document.querySelector('.loading-container');
    if (loadingContainer) {
        loadingContainer.remove();
    }
}

// Add CSS styles for loading spinner
const loadingStyles = `
<style>
.loading-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 400px;
    gap: 20px;
}

.loading-spinner {
    width: 50px;
    height: 50px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

.loading-text {
    font-size: 16px;
    color: #666;
    font-weight: 500;
}

.error-message {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 200px;
    font-size: 16px;
    color: #e74c3c;
    font-weight: 500;
    text-align: center;
    padding: 20px;
    background-color: #fdf2f2;
    border: 1px solid #f5c6cb;
    border-radius: 8px;
    margin: 20px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
`;

// Add loading styles to the head
if (!document.querySelector('#loading-styles')) {
    const styleElement = document.createElement('style');
    styleElement.id = 'loading-styles';
    styleElement.innerHTML = loadingStyles.replace('<style>', '').replace('</style>', '');
    document.head.appendChild(styleElement);
}
