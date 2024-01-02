const delay = (ms) => new Promise((resolve) => setTimeout(resolve, ms));

const displayText = async (txt) => {
    await delay(2000);
    console.log(txt);
};

(async () => {
    await displayText("");
    await displayText("");
    await displayText("Terimakasih tahun 2023");
    await displayText("Untuk segala kebaikan dan tantangan yang dihadirkan");
    await displayText(
        "Tahun ini menghadirkan berbagai kejutan dan pelajaran berharga"
    );
    await displayText("Terimakasih atas setiap pengalaman yang diberikan");
    await displayText("");
    await displayText("");
    await displayText("Selamat Tahun Baru 2024 🎉✨");
    await displayText(
        "Semoga di tahun depan, segala rencana dan kegiatan selalu dilancarkan"
    );
    await displayText("😊");
    await displayText("");
    await displayText("");
    await displayText("");
    await displayText("");
    await displayText("");
})();
