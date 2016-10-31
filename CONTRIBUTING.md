# Contribution Guide

## Contribution to InvoicePlane

Every help is welcome, you don't have to be a professional PHP developer or SQL database engineer.
If you are not familiar with PHP or coding in general you could also help us in other ways.

### Helpful Links

[![Wiki](https://img.shields.io/badge/Help%3A-Official%20Wiki-429ae1.svg)](https://wiki.invoiceplane.com/)    
[![Community Forums](https://img.shields.io/badge/Help%3A-Community%20Forums-429ae1.svg)](https://community.invoiceplane.com/)    
[![Issue Tracker](https://img.shields.io/badge/Development%3A-Issue%20Tracker-429ae1.svg)](https://development.invoiceplane.com/)    
[![Roadmap](https://img.shields.io/badge/Development%3A-Roadmap-429ae1.svg)](https://go.invoiceplane.com/roadmapv2)    
[![Slack Chat](https://img.shields.io/badge/Chat%3A-Slack-E01563.svg)](https://invoiceplane-slack.herokuapp.com/)    

### Contributing Code

:warning: **Read this carefully to prevent your pull request to be closed!**

1. Before you submit any code to the repository please take a look at the [development tracker](https://development.invoiceplane.com) and search for your issue!
    * If an issue exists and someone is working on it, please contact this person.
    * If an issue exists and no one is working on it, assign it to yourself or write a comment.
2. Always reference the issue ID (e.g. IP2-317) in all commits you make for this issue.
3. Before you create a pull request, rebase from the development branch.
    * Add the development branch as a remote: `git remote add ip git@github.com:InvoicePlane/InvoicePlane.git`
    * Do a rebase with the following command: `git pull --rebase ip development`
      Where `ip` is the name of the remote and `development` the branch.
    * Solve all conflicts and check if your code is still working.
4. Submit the pull request, reference the issue ID in the title and add a meaningful description.

---
  
*Please notice: The name 'InvoicePlane' and the InvoicePlane logo are both copyright by Kovah.de and InvoicePlane.com
and their usage is restricted! For more information visit invoiceplane.com/license-copyright*
