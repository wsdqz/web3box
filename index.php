<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web3Box - Rewards for Web3 Active Users</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="img/box.png" type="image/png">
</head>
<body>
<!-- Glowing effects -->
<div class="glow glow-1"></div>
<div class="glow glow-2"></div>
<div class="glow glow-3"></div>

<!-- Header -->
<header>
    <div class="container">
        <nav>
            <div class="logo"><a href="#info">Web3Box</a></div>
            <div class="nav-links">
                <a href="#about">About Us</a>
                <a href="#partners">Partners</a>
                <a href="#rewards">Rewards</a>
                <a href="#live-claims">Live Claims</a>
                <a href="#eligibility">Terms</a>
                <a href="#faq">FAQ</a>
            </div>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="hero" id="info">
    <div class="container">
        <h1>Get a Web3 Mystery Box</h1>
        <p>Exclusive rewards for active Web3 users. Connect your wallet and gain access to unique digital assets.</p>
        <button class="cta-button" id="connectWalletBtn">Connect wallet</button>
    </div>
</section>

<!-- Box Section -->
<section class="container" id="about">
    <div class="box-container">
        <div class="box-image">
            <img src="img/box.png" alt="Web3Box">
        </div>
        <div class="box-details">
            <h2>What is Web3Box?</h2>
            <p>Web3Box is a unique opportunity to receive valuable digital assets from Mystery Box. Each Web3 Mystery Box contains a random set of rewards of varying rarity, from rare to legendary.</p>
            <p>Our initiative is designed to reward active users of the Web3 ecosystem who contribute to the development of decentralized technologies through their actions.</p>
            <p>All you need to do is connect your wallet. We will check your blockchain activity, and if you meet the <a href="#eligibility">criteria</a>, you will receive your Web3Box.</p>
        </div>
    </div>
</section>

<!--Partners-->
<section class="partners" id="partners">
    <div class="container">
        <h2>Our Supporters</h2>
        <div class="partners-grid">
            <div class="partner-logo">
                <img src="img/binance.png" alt="Binance">
            </div>
            <div class="partner-logo">
                <img src="img/okx.png" alt="OKX">
            </div>
            <div class="partner-logo">
                <img src="img/trust.png" alt="Trust Wallet">
            </div>
            <div class="partner-logo">
                <img src="img/metamask.png" alt="MetaMask">
            </div>
            <div class="partner-logo">
                <img src="img/bybit.png" alt="Bybit">
            </div>
            <div class="partner-logo">
                <img src="img/bitget.png" alt="BitGet">
            </div>
            <div class="partner-logo">
                <img src="img/ledger.png" alt="ledger">
            </div>
            <div class="partner-logo">
                <img src="img/walletconnect.png" alt="wallet-conect">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <h2>Web3Box Features</h2>
        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-gift"></i></div>
                <h3>Completely free</h3>
                <p>All Web3Boxes are distributed absolutely free of charge to users who meet the <a href="#eligibility">criteria</a>.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-search"></i></div>
                <h3>A transparent process</h3>
                <p>All information about the selection and award process is open and available on the blockchain.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-sync-alt"></i></div>
                <h3>Regular updates</h3>
                <p>New reward tokens are added regularly.</p>
            </div>
        </div>
    </div>
</section>

<!-- Rewards Section -->
<section class="rewards" id="rewards">
    <div class="container">
        <h2>What can you get from Web3 Mystery Box</h2>
        <div class="rewards-grid">
            <div class="reward-card">
                <img src="img/doge.png" alt="memes">
                <h3>Meme Coins</h3>
                <p>Popular memecoins (TRUMP, DOGE, PEPE etc.)</p>
                <span class="reward-rarity rarity-rare">Rare</span>
            </div>
            <div class="reward-card">
                <img src="img/eth.png" alt="alts">
                <h3>Altcoins</h3>
                <p>Reliable cryptocurrencies with a strong ecosystem (ETH, BNB, LTC, etc.)</p>
                <span class="reward-rarity rarity-epic">Epic</span>
            </div>
            <div class="reward-card">
                <img src="img/btc.png" alt="btc">
                <h3>Bitcoin</h3>
                <p>Gold of the digital world (BTC)</p>
                <span class="reward-rarity rarity-legendary">Legendary</span>
            </div>
        </div>
    </div>
</section>

<!-- Live Claims -->
<section class="live-claims" id="live-claims">
    <div class="container">
        <h2><span class="live-dot"></span>Live Claims</h2>
        <div class="live-claims-table interact-button" id="liveClaimsTable">
            <!-- Claims will be generated here -->
        </div>
    </div>
</section>

<!-- Live Claims Script -->
<script src="live.js"></script>

<!-- Eligibility Section -->
<section class="eligibility" id="eligibility">
    <div class="container">
        <h2>Who can get Web3 Mystery Box</h2>
        <div class="eligibility-list">
            <div class="eligibility-item">
                <span class="check-icon">✓</span>
                <p>Users who have completed at least 5 transactions on the network in any blockchains in the last 30 days</p>
            </div>
                <div class="eligibility-item">
                <span class="check-icon">✓</span><p>Users who own at least 3 different tokens or NFTs</p>
                </div>
            <div class="eligibility-item">
                <span class="check-icon">✓</span>
                <p>Users who have interacted with Web 3 DeFi protocols or applications in the last 60 days</p>
            </div>
            <div class="eligibility-item">
                <span class="check-icon">✓</span>
                <p>Users who have not received Web3Box before</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq" id="faq">
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-item">
            <div class="faq-question">How to get Web3 Mystery Box?</div>
            <div class="faq-answer">
                <p>Just connect your wallet, and our system will automatically check if you meet the <a href="#eligibility">criteria</a>. If you do, you will be able to get your Web3 Mystery Box immediately.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">I connected my wallet but nothing happened, what should I do?</div>
            <div class="faq-answer">
                <p>Try connecting your wallet again, sometimes the system may give an error due to overload.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">"You Are Not Eligible", why am I seeing this message??</div>
            <div class="faq-answer">
                <p>Usually, our system requests access to all networks at once to check the activity, but some wallets ask you to select a specific network to give access to. Try connecting different networks in this case. If this warning continues to appear, it means that your wallet do not meet the <a href="#eligibility">criteria</a>, connect another wallet.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">How much does Web3 Mystery Box cost?</div>
            <div class="faq-answer">
                <p>Web3 Mystery Box is completely free for all users who meet the <a href="#eligibility">criteria</a>. You only need to pay the gas fee for the transaction to receive the Web3 Mystery Box.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">Which wallets are supported?</div>
            <div class="faq-answer">
                <p>We support all popular wallets, including Trust Wallet, MetaMask, WalletConnect, Coinbase Wallet, and other Web3-compatible wallets.</p>
            </div>
        </div>
        <div class="faq-item">
            <div class="faq-question">How often can I get Web3Box?</div>
            <div class="faq-answer">
                <p>Currently, there is a limit of one address - one Web3 Mystery Box. However, we plan to hold special events during which it will be possible to receive additional Web3Boxes.</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <div class="container">
        <p class="copyright">© 2025 Web3Box. All rights reserved.</p>
    </div>
</footer>

<!-- Support Button -->
<div class="support-button" id="supportButton">
    <i class="fas fa-headset"></i>
</div>

<!-- Support Modal -->
<div class="support-modal" id="supportModal">
    <div class="support-form">
        <div class="close-modal" id="closeModal">&times;</div>
        <div id="supportFormContainer">
            <h3>Contact Support</h3>
            <form id="supportForm">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" required>
                    <div class="error-message">Please enter your name</div>
                </div>
                <div class="form-group">
                    <label for="telegram">Your Telegram Username</label>
                    <input type="text" id="telegram" name="telegram" placeholder="@username" required>
                    <div class="error-message">Please enter a valid Telegram username</div>
                </div>
                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" name="message" required></textarea>
                    <div class="error-message">Please enter your message</div>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
        <div class="form-success" id="formSuccess">
            <i class="fas fa-check-circle"></i>
            <p>Thank you! Your message has been sent.</p>
            <p>We'll contact you via Telegram soon.</p>
            <button class="cta-button" id="closeSuccess">Close</button>
        </div>
    </div>
</div>
<script src="support.js"></script>
<script src="script.js"></script>
</body>
</html>