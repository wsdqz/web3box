// live-claims.js - Separate file for Live Claims functionality

// Initialize Live Claims
function initLiveClaims(containerElementId) {
    // Use existing container if provided, otherwise use default
    const tableId = containerElementId || "liveClaimsTable";
    const claimsTable = document.getElementById(tableId);

    // If table doesn't exist, don't proceed
    if (!claimsTable) return;

    // Generate and display initial claims
    generateClaims(tableId);

    // Set up periodic addition of new claims for a live effect
    setInterval(() => addNewClaim(tableId), 8000); // Add a new claim every 8 seconds
}

// List of currency types with different weights/probabilities and their network types
const currencies = [
    // Meme coins (very common)
    { symbol: 'TRUMP', type: 'trump', weight: 25, network: 'eth' },
    { symbol: 'DOGE', type: 'meme', weight: 25, network: 'doge' },
    { symbol: 'PEPE', type: 'meme', weight: 25, network: 'eth' },
    { symbol: 'SHIB', type: 'meme', weight: 20, network: 'eth' },
    { symbol: 'FLOKI', type: 'meme', weight: 15, network: 'eth' },

    // Altcoins (less common)
    { symbol: 'ETH', type: 'alt', weight: 10, network: 'eth' },
    { symbol: 'BNB', type: 'alt', weight: 8, network: 'eth' },
    { symbol: 'SOL', type: 'alt', weight: 7, network: 'sol' },
    { symbol: 'LTC', type: 'alt', weight: 6, network: 'ltc' },
    { symbol: 'DOT', type: 'alt', weight: 5, network: 'dot' },

    // Bitcoin (rare)
    { symbol: 'BTC', type: 'btc', weight: 2, network: 'btc' }
];

// Generate a weighted random currency based on the weights
function getRandomCurrency() {
    const totalWeight = currencies.reduce((sum, currency) => sum + currency.weight, 0);
    let random = Math.random() * totalWeight;

    for (let currency of currencies) {
        random -= currency.weight;
        if (random <= 0) {
            return currency;
        }
    }

    // Fallback to a meme coin if something goes wrong
    return currencies[0];
}

// Generate random characters for different wallet formats
function getRandomChars(length, charset) {
    let result = '';
    const characters = charset || '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const charactersLength = characters.length;

    for (let i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }

    return result;
}

// Generate a random wallet address based on network type
function generateWalletAddress(network) {
    switch (network) {
        case 'btc':
            return 'bc1' + getRandomChars(40, '0123456789abcdefghijklmnopqrstuvwxyz');

        case 'eth':
            return '0x' + getRandomChars(40, '0123456789abcdef');

        case 'doge':
            return getRandomChars(44, '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');

        case 'sol':
            return getRandomChars(44, '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');

        case 'ltc':
            return 'ltc1' + getRandomChars(39, '0123456789abcdefghijklmnopqrstuvwxyz');

        case 'dot':
            return '1' + getRandomChars(47, '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');

        default:
            return '0x' + getRandomChars(40, '0123456789abcdef');
    }
}

// Mask wallet address appropriately based on network type
function maskAddress(address, network) {
    switch (network) {
        case 'btc':
            return address.substring(0, 8) + '...' + address.substring(address.length - 8);

        case 'eth':
            return address.substring(0, 6) + '...' + address.substring(address.length - 6);

        case 'doge':
            return address.substring(0, 8) + '...' + address.substring(address.length - 4);

        case 'sol':
            return address.substring(0, 6) + '...' + address.substring(address.length - 4);

        case 'ltc':
            return address.substring(0, 8) + '...' + address.substring(address.length - 8);

        case 'dot':
            return address.substring(0, 6) + '...' + address.substring(address.length - 6);

        default:
            return address.substring(0, 6) + '...' + address.substring(address.length - 6);
    }
}

// Generate a random amount based on currency type
function generateAmount(currencyType) {
    let min, max, decimals;

    switch(currencyType) {
        case 'btc':
            min = 0.001;
            max = 0.25;
            decimals = 4;
            break;
        case 'alt':
            min = 0.01;
            max = 1.5;
            decimals = 2;
            break;
        case 'trump':
            min = 1;
            max = 100;
            decimals = 0;
            break;
        case 'meme':
            min = 50;
            max = 1000;
            decimals = 0;
            break;
        default:
            min = 10;
            max = 500;
            decimals = 0;
    }

    const amount = min + Math.random() * (max - min);
    return amount.toFixed(decimals);
}

// Create a new claim element
function createClaimElement(address, amount, currency) {
    const claimElement = document.createElement('div');
    claimElement.className = 'claim-item';

    claimElement.innerHTML = `
        <div class="claim-address">${address}</div>
        <div class="claim-amount">+${amount} ${currency.symbol} <img src="img/live/${currency.symbol.toLowerCase()}.png" alt="${currency.symbol}" class="currency-icon"></div>
    `;

    return claimElement;
}

// Generate initial set of claims
function generateClaims(containerId) {
    const claimsTable = document.getElementById(containerId);
    if (!claimsTable) return;

    // Generate 8-10 initial claims
    const numberOfClaims = 10;

    for (let i = 0; i < numberOfClaims; i++) {
        const currency = getRandomCurrency();
        const fullAddress = generateWalletAddress(currency.network);
        const maskedAddress = maskAddress(fullAddress, currency.network);
        const amount = generateAmount(currency.type);

        const claimElement = createClaimElement(maskedAddress, amount, currency);
        claimsTable.appendChild(claimElement);
    }
}

// Add a new claim at the top and remove oldest one
function addNewClaim(containerId) {
    const claimsTable = document.getElementById(containerId);
    if (!claimsTable) return;

    const claims = claimsTable.querySelectorAll('.claim-item');

    // Create a new claim
    const currency = getRandomCurrency();
    const fullAddress = generateWalletAddress(currency.network);
    const maskedAddress = maskAddress(fullAddress, currency.network);
    const amount = generateAmount(currency.type);

    const newClaimElement = createClaimElement(maskedAddress, amount, currency);

    // Add animation class
    newClaimElement.classList.add('new-claim');

    // Add to the top
    claimsTable.insertBefore(newClaimElement, claimsTable.firstChild);

    // Remove animation class after animation completes
    setTimeout(() => {
        newClaimElement.classList.remove('new-claim');
    }, 1000);

    // Remove oldest claim if there are more than 10
    if (claims.length >= 10) {
        claims[claims.length - 1].remove();
    }
}

// Export functions for use in other scripts
window.LiveClaims = {
    init: initLiveClaims,
    addClaim: addNewClaim
};

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Just call the function without creating a new section
    initLiveClaims("liveClaimsTable");
});