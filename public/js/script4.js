let userData = {
  nama: "",
  gender: "",
  city: "",
  email: ""
};

function editProfile() {
  document.getElementById("profileData").style.display = "none";
  document.getElementById("editForm").style.display = "block";

  document.getElementById("inputNama").value = userData.nama;
  document.getElementById("inputGender").value = userData.gender;
  document.getElementById("inputCity").value = userData.city;
  document.getElementById("inputEmail").value = userData.email;
}

function cancelEdit() {
  document.getElementById("editForm").reset();
  document.getElementById("editForm").style.display = "none";
  document.getElementById("profileData").style.display = "block";
}

document.getElementById("editForm").addEventListener("submit", function (e) {
  e.preventDefault();

  userData.nama = document.getElementById("inputNama").value;
  userData.gender = document.getElementById("inputGender").value;
  userData.city = document.getElementById("inputCity").value;
  userData.email = document.getElementById("inputEmail").value;

  document.getElementById("profileNama").innerText = userData.nama || "-";
  document.getElementById("profileGender").innerText = userData.gender || "-";
  document.getElementById("profileCity").innerText = userData.city || "-";
  document.getElementById("profileEmail").innerText = userData.email || "-";

  document.getElementById("editForm").style.display = "none";
  document.getElementById("profileData").style.display = "block";
});