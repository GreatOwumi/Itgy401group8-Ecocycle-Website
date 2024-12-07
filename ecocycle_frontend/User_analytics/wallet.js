document.addEventListener("DOMContentLoaded", () => {
    const walletMetrics = {
        totalEarnings: 921780.02,
        balance: 119233.70,
        pendingWithdrawal: 7890.02,
        withdrawnToday: 0.00
    };

    const updateWalletValues = () => {
        walletMetrics.totalEarnings += Math.random() * 500;
        walletMetrics.balance = walletMetrics.totalEarnings - walletMetrics.pendingWithdrawal;
        walletMetrics.pendingWithdrawal += Math.random() * 50;
        walletMetrics.withdrawnToday += Math.random() * 10;

        document.querySelector(".total-earnings .amount").textContent = walletMetrics.totalEarnings.toFixed(2);
        document.querySelector(".balance .amount").textContent = walletMetrics.balance.toFixed(2);
        document.querySelector(".pending-withdrawal .amount").textContent = walletMetrics.pendingWithdrawal.toFixed(2);
        document.querySelector(".withdrawn-today .amount").textContent = walletMetrics.withdrawnToday.toFixed(2);
    };

    setInterval(updateWalletValues, 10000);
});