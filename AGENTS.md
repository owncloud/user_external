# AGENTS.md — user_external

## Repository Overview

An ownCloud Server (OC10) app providing external authentication backends (FTP, IMAP, SMB, WebDAV). Passwords are authenticated against remote services and never stored locally.

- **Classification:** Classic (OC10)
- **Activity Status:** Active
- **License:** No license detected
- **Language:** PHP

## Architecture & Key Paths

- `appinfo/` — ownCloud app metadata (info.xml, routes)
- `lib/` — PHP backend (FTP, IMAP, SMB, WebDAV auth backends)
- `img/` — App icon and images
- `tests/` — PHPUnit test suites
- `Makefile` — Build and test orchestration
- `composer.json` — PHP dependencies
- `phpstan.neon` — PHPStan static analysis config
- `phpunit.xml` — PHPUnit config
- `.github/CONTRIBUTING.md` — Contribution guidelines
- `CHANGELOG.md` — Version history

## Development Conventions

- Standard ownCloud OC10 app structure
- Code style enforced by phpcs
- PHPStan for static analysis
- PR template available
- Contributing guidelines in `.github/CONTRIBUTING.md`

## Build & Test Commands

```bash
make all                    # Install dependencies
make dist                   # Build distribution
make clean                  # Clean artifacts
make test-php-unit          # Run PHP unit tests
make test-php-style         # Check code style
make test-php-style-fix     # Auto-fix style
make test-php-phpstan       # Run PHPStan
make test-php-phan          # Run Phan
make test-acceptance-api    # Run API acceptance tests
make test-acceptance-cli    # Run CLI acceptance tests
make test-acceptance-webui  # Run webUI acceptance tests
```

## Important Constraints

- **No license file detected:** The OSPO is working on license formalization as part of the Apache 2.0 migration.
- **Security-sensitive:** Handles authentication credentials against remote services.
- **Not compatible with LDAP:** Cannot be used alongside the LDAP user/group backend.
- **PHP extension dependencies:** FTP SSL requires `php-openssl`; IMAP requires `php-imap`; SMB requires `smbclient` in `$PATH`.
- **Database table:** Stores users in `users_external` table; changing backend config requires updating the `backend` field.
- Do not introduce new **copyleft-licensed dependencies** (GPL, AGPL, LGPL, MPL) without explicit discussion in an issue first. This is especially important for repos that are migrating to or already under Apache 2.0, as copyleft dependencies would block or complicate that migration.


## OSPO Policy Constraints

### GitHub Actions
- **Only** use actions owned by `owncloud`, created by GitHub (`actions/*`), verified on the GitHub Marketplace, or verified by the ownCloud Maintainers.
- Pin all actions to their full commit SHA (not tags): `uses: actions/checkout@<SHA> # vX.Y.Z`
- Never introduce actions from unverified third parties.

### Dependency Management
- Dependabot is configured for automated dependency updates.
- Review and merge Dependabot PRs as part of regular maintenance.
- Do not introduce new dependencies without discussion in an issue first.

### Git Workflow
- **Rebase policy**: Always rebase; never create merge commits. Use `git pull --rebase` and `git rebase` before pushing.
- **Signed commits**: All commits **must** be PGP/GPG signed (`git commit -S -s`).
- **DCO sign-off**: Every commit needs a `Signed-off-by` line (`git commit -s`).
- **Conventional Commits & Squash Merge**: Use the [Conventional Commits](https://www.conventionalcommits.org/) format where the repository enforces it. Many repos use squash merge, where the PR title becomes the commit message on the default branch — apply Conventional Commits format to PR titles as well. A reusable GitHub Actions workflow enforces this.

## Context for AI Agents

- This is an ownCloud Server (OC10) app.
- Configuration is done via `config/config.php` on the server, not through the web UI.
- The `lib/` directory contains one auth backend class per protocol (FTP, IMAP, SMB, WebDAV).
- User display names are stored in the `users_external` database table.
