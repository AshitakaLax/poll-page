import { Inject, Injectable } from '@angular/core';
import { DOCUMENT } from '@angular/common';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class PollService {
  /**
   * The URL for the Sample Data.
   */
  private churchUrl: string;
  /**
   * The URL for the Sample Data.
   */
  private zoomRedirectUrl: string;

  /**
   *
   * @param http The http Client.
   * @param baseUrl The Base Url for the service.
   */
  constructor(
    private http: HttpClient,
    @Inject('BASE_URL') baseUrl: string,
    @Inject(DOCUMENT) private document: Document
  ) {
    this.churchUrl = baseUrl + 'church';
    this.zoomRedirectUrl = baseUrl + 'zoom';
  }

  /**
   * Gets the ground networks.
   */
  incrementViewerCount(viewerCount: string | number) {
    const apiUrl = this.churchUrl + '/api.php?viewers=' + viewerCount;
    return this.http.get(apiUrl).subscribe(() => this.goToUrl());
  }

  goToUrl(): void {
    this.document.location.href = this.churchUrl + '/redirect.php';
  }

  goToSacramentMeeting(): void {
    this.document.location.href = this.churchUrl + '/redirect.php';
  }
  goToSundaySchool(): void {
    this.document.location.href = this.zoomRedirectUrl + '/ss.php';
  }
  goToReliefSociety(): void {
    this.document.location.href = this.zoomRedirectUrl + '/rs.php';
  }
  goToElderQuorum(): void {
    this.document.location.href = this.zoomRedirectUrl + '/eq.php';
  }
}
