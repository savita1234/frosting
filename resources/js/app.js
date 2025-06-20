console.log("✅ app.js is loaded!");

import './bootstrap';
import '../sass/app.scss';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleButton = document.getElementById("toggleSidebar");

    if (toggleButton) {
        toggleButton.addEventListener("click", function () {
            sidebar.classList.toggle("show");
        });
    }

    let expenseIndex = 1; // Start from 1 because 0 is already used

    document.getElementById('add-expense').addEventListener('click', function () {
        const wrapper = document.getElementById('expenses-wrapper');
        const row = document.createElement('div');
        row.classList.add('expense-row', 'd-flex', 'mb-2');
        row.innerHTML = `
            <input type="text" name="expenses[${expenseIndex}][expense_description]" class="form-control me-2" placeholder="e.g., Tea" required>
            <input type="number" name="expenses[${expenseIndex}][amount]" class="form-control me-2" placeholder="Amount" required>
            <button type="button" class="btn btn-danger remove-expense">X</button>
        `;
        wrapper.appendChild(row);
        expenseIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-expense')) {
            e.target.closest('.expense-row').remove();
        }
    });


    let branchCount = 1;
    console.log(branchCount);

    const addBranchBtn = document.getElementById('addBranch');
    if (addBranchBtn) {
        addBranchBtn.addEventListener('click', function () {
            console.log('hello');
            let branchesDiv = document.getElementById('branches');
            let newIndex = branchCount;

            let branchHtml = `
                <div class="branch-card card p-3 mb-3" id="branch-${newIndex}">
                    <h5>Branch ${newIndex + 1}</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" name="branches[${newIndex}][address]" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">City</label>
                            <input type="text" name="branches[${newIndex}][city]" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label class="form-label">State</label>
                            <input type="text" name="branches[${newIndex}][state]" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Country</label>
                            <input type="text" name="branches[${newIndex}][country]" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pincode</label>
                            <input type="text" name="branches[${newIndex}][pincode]" class="form-control" required>
                        </div>
                    </div>
                    <div class="mt-3 text-end">
                        <button type="button" class="btn btn-danger btn-sm remove-branch">Remove</button>
                    </div>
                </div>
            `;

            branchesDiv.insertAdjacentHTML('beforeend', branchHtml);
            branchCount++;

            // Update hidden input for branch count
            document.getElementById('no_of_branches').value = branchCount;

            // Attach event listener for remove button
            attachRemoveEvent();
        });
    }

    function attachRemoveEvent() {
        document.querySelectorAll('.remove-branch').forEach(button => {
            button.addEventListener('click', function () {
                this.closest('.branch-card').remove();
                branchCount--;
                document.getElementById('no_of_branches').value = branchCount;
            });
        });
    }
});

   
