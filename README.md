# JSLoadFix

**Prevents infinite reload loops and ensures JS scripts load properly using a configurable session guard.**

## Special thanks
This project is open-source and maintained by the community.
Contributors:
- QKing (Initial Commit)
- Corwin (Creator and Maintainer of Paymenter)
- [Corpse](https://builtbybit.com/members/msi.629144) (Updated the v1.0 code to release version 1.1)

---

## Overview
The **JS Load Fix** extension helps your site or application prevent unwanted page reloads caused by scripts using session or cookie-based guards. By using a `sessionStorage` timestamp with a configurable failsafe time, this extension ensures other JS scripts load reliably without causing reload loops.

---

## Why Use This Extension?
Avoid disruptive reload loops that frustrate users. This extension ensures scripts like Tawk.to or other custom JS widgets load properly, even when users navigate between pages. It's simple, safe, and configurable for any web environment.

---

## Features
- Prevents infinite reload loops with a `sessionStorage` timestamp  
- Configurable failsafe time in milliseconds  
- Lightweight and standalone extension  
- Injects logic automatically into the page body  
- Works seamlessly on both client and admin panels  
- Includes small delay to ensure storage writes before reload  
- Keeps original comments for clarity and maintainability  

---

## Security
No sensitive keys are required. The extension only manages a session-based timestamp to prevent reload loops. It operates entirely in the browser with minimal risk, making it safe for production use.

---

## Configuration
Easy to set up:  
1. Enter your desired **Failsafe Time (ms)** – the minimum time before reload can occur again (default: `1000 ms`)  
2. Enable the extension – JS reload logic will automatically run on page load  
3. No additional settings or API keys are required  

---

## Installation
1. Upload the **JS Load Fix** extension zip into your Paymenter extensions directory.  
2. Enable the extension from the admin panel.  
3. Set your failsafe time, and it will automatically prevent reload loops on your pages.

---

## Support
For configuration questions or assistance, contact the developer **QKingsoftware** via BuiltByBit or Discord for direct support.

---

## License
This project is licensed under the **[QKOL v3.0 License](#)**.
