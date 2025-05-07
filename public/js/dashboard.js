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
              <span>See Request</span>
              <span class="icon-button">
                <i class="ph-caret-right-bold"></i>
              </span>
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
              <span>See Request</span>
              <span class="icon-button">
                <i class="ph-caret-right-bold"></i>
              </span>
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
              <span>See Request</span>
              <span class="icon-button">
                <i class="ph-caret-right-bold"></i>
              </span>
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
        .catch((error) =>
            console.error("Error fetching document counts:", error)
        );
});

function showUser() {
    const maincontent = document.getElementById("maincontent");
    const dashboard = document.getElementById("dashboard");
    if (maincontent) {
        dashboard.style.color = "#969593"; // Set the text color to a different color
        // Fetch the user view content
        fetch("/admin/user") // Adjust the URL as necessary
            .then((response) => response.text()) // Get the response text
            .then((html) => {
                maincontent.innerHTML = html; // Set the innerHTML to the fetched HTML
            })
            .catch((error) =>
                console.error("Error fetching user view:", error)
            );
    }
}

function showDocumentRequest() {
    document.getElementById("payment-section").style.display = "none";
    document.getElementById("dropdownmenu").style.display = "none";
    const maincontent = document.getElementById("maincontent");
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        // Fetch the documentrequest view content
        fetch("/admin/document_requests") // Adjust the URL as necessary
            .then((response) => response.text()) // Get the response text
            .then((html) => {
                maincontent.innerHTML = html; // Set the innerHTML to the fetched HTML
            })
            .catch((error) =>
                console.error("Error fetching user view:", error)
            );
    }
}
function toggleDropdown(element) {
    document.getElementById("dropdownmenu").style.display = "block";
    document.getElementById("createdropdownmenu").style.display = "none";
    document.getElementById("financialdropdownmenu").style.display = "none";
    document.getElementById("eventdropdownmenu").style.display = "none";
    document.getElementById("clergydropdownmenu").style.display = "none";
}
function createtoggleDropdown() {
    document.getElementById("createdropdownmenu").style.display = "block";
    document.getElementById("dropdownmenu").style.display = "none";
    document.getElementById("financialdropdownmenu").style.display = "none";
    document.getElementById("eventdropdownmenu").style.display = "none";
    document.getElementById("clergydropdownmenu").style.display = "none";
}
function financialtoggleDropdown() {
    document.getElementById("financialdropdownmenu").style.display = "block";
    document.getElementById("createdropdownmenu").style.display = "none";
    document.getElementById("dropdownmenu").style.display = "none";
    document.getElementById("eventdropdownmenu").style.display = "none";
    document.getElementById("clergydropdownmenu").style.display = "none";
}
function eventtoggleDropdown() {
  document.getElementById("eventdropdownmenu").style.display = "block";
  document.getElementById("financialdropdownmenu").style.display = "none";
  document.getElementById("createdropdownmenu").style.display = "none";
  document.getElementById("dropdownmenu").style.display = "none";
  document.getElementById("clergydropdownmenu").style.display = "none";
}
function clergytoggleDropdown() {
  document.getElementById("clergydropdownmenu").style.display = "block";
  document.getElementById("eventdropdownmenu").style.display = "none";
  document.getElementById("financialdropdownmenu").style.display = "none";
  document.getElementById("createdropdownmenu").style.display = "none";
  document.getElementById("dropdownmenu").style.display = "none";
}
function showParishionerCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "none";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
        fetch("/admin/parishionerCreate")
            .then((response) => response.text())
            .then((html) => {
                maincontent.innerHTML = html;
            })
            .catch((error) =>
                console.error("Error fetching user view:", error)
            );
    }
}

function showParishionerRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
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
            });
    }
}

function showBaptistCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
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
            });
    }
}

function showBaptistRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
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
            });
    }
}
function showConfirmationCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
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
            });
    }
}
function showConfirmationRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
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
            });
    }
}
function showMarriageCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
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
            });
    }
}
function showMarriageRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
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
            });
    }
}
function showDeathCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
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
            });
    }
}
function showDeathRecord() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
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
            });
    }
}
function showDonationCreate() {
    const maincontent = document.getElementById("maincontent");
    document.getElementById("payment-section").style.display = "block";
    const dashboard = document.getElementById("dashboard");

    if (maincontent) {
        dashboard.style.color = "#969593";
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
            });
    }
}
function showDonationRecord() {
  const maincontent = document.getElementById("maincontent");
  document.getElementById("payment-section").style.display = "block";
  const dashboard = document.getElementById("dashboard");

  if (maincontent) {
      dashboard.style.color = "#969593";
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
          });
  }
}
function showMassCreate() {
  const maincontent = document.getElementById("maincontent");
  document.getElementById("payment-section").style.display = "block";
  const dashboard = document.getElementById("dashboard");

  if (maincontent) {
      dashboard.style.color = "#969593";
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
          });
  }
}
function showMassRecord() {
  const maincontent = document.getElementById("maincontent");
  document.getElementById("payment-section").style.display = "block";
  const dashboard = document.getElementById("dashboard");

  if (maincontent) {
      dashboard.style.color = "#969593";
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
          });
  }
}
