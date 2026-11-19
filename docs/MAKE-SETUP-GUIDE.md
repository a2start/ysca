# YSCA Make.com Auto-Share Pipeline Setup Guide

This guide walks you through importing and connecting the **Make.com** automated syndication scenario for Young Star Cricket Academy.

---

## What This Pipeline Does

Whenever you publish an update with **"📢 All Socials"** checked in `manager.youngstarcricketacademy.com`, Make.com automatically posts:

1. 📍 **Google Business Profile**: Creates a "What's New" local update with a **Learn More** link (Boosts local Greater Noida search ranking).
2. 📘 **Facebook Page**: Publishes the announcement/photo to the official YSCA Facebook Page.
3. 📸 **Instagram for Business**: Publishes the photo/caption with branded cricket hashtags.
4. 🐦 **X (formerly Twitter)**: Dispatches a tweet formatted to fit within Twitter character limits.
5. 🎬 **YouTube**: Publishes a Community post with video/academy highlights link.

---

## Step 1: Create a Free Make.com Account

1. Go to [https://www.make.com/](https://www.make.com/) and sign up for a free account.
2. The free plan provides **1,000 automated operations/month**, which is plenty for daily academy updates.

---

## Step 2: Import the Pre-Built Scenario Blueprint

You do **not** need to build the scenario from scratch. Use the included blueprint file:
`docs/YSCA_Make_Scenario_Blueprint.json`

1. In Make.com, go to **Scenarios** → click **Create a new scenario**.
2. Look at the bottom toolbar: click the **"..." (More options)** button.
3. Select **Import Blueprint**.
4. Choose the file: **`docs/YSCA_Make_Scenario_Blueprint.json`** from this repository (or copy-paste its JSON contents).
5. Click **Save**. All 5 platform modules and the router will appear on your canvas immediately!

---

## Step 3: Activate Your Webhook & Copy the URL

1. Click on the first module: **"YSCA Manager Webhook"**.
2. Click **Create a webhook**.
3. Name it: `YSCA Manager Production`.
4. Make will generate a unique URL, such as:
   `https://hook.eu1.make.com/a1b2c3d4e5f6g7h8...`
5. Click **Copy address to clipboard**.

---

## Step 4: Add Webhook URL to Cloudflare Pages

1. Log into your **Cloudflare Dashboard**.
2. Go to **Workers & Pages** → select the **`ysca`** project.
3. Click **Settings** → **Environment variables**.
4. Click **Add variable**:
   * **Variable name**: `MAKE_WEBHOOK_URL`
   * **Value**: *(Paste the Make.com webhook URL copied in Step 3)*
5. Click **Save and deploy**.

---

## Step 5: Connect Your Social Accounts in Make.com

Click on each module on your Make canvas and click **Add** to sign into the academy's official accounts:

| Module | What to Select |
| :--- | :--- |
| **Google Business Profile** | Click **Create a connection** → Sign in with Google account managing the YSCA listing → Select the Malakpur, Greater Noida location. |
| **Facebook Page** | Click **Create a connection** → Log into Facebook → Select **Young Star Cricket Academy Page**. |
| **Instagram for Business** | Select your connected Instagram professional profile. |
| **X / Twitter** | Click **Create a connection** → Authorize the YSCA Twitter account. |
| **YouTube** | Click **Create a connection** → Select the Google account hosting the YSCA YouTube channel. |

---

## Step 6: Test & Turn On

1. At the bottom left in Make.com, click the big purple button: **"Run once"**.
2. Go to **https://manager.youngstarcricketacademy.com/** and publish a test update with **"📢 All Socials"** checked.
3. You will see green checkmarks appear on all modules in Make.com!
4. At the bottom left of Make, toggle the scenario switch from **OFF** to **ON**.

You are now fully automated! Every time you post in the manager dashboard, it will cross-post to all platforms with zero manual effort.

